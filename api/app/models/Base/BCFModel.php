<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 6/20/18
 * Time: 7:42 PM
 */

namespace BCF\Models\Base;

use Phalcon\Mvc\Model;

abstract class BCFModel extends Model
{
    const CHILD_CLASS = [];
    
    public function getChildClass(string $childName): string
    {
        return static::CHILD_CLASS[$childName] ?? '';
    }
    
    public function initialize()
    {
        $this->skipAttributes(
            [
                'created_at',
                'modified_at',
            ]
        );
    }
    
    public function setAttributes(array $data)
    {
        foreach ($this->columnMap() as $column) {
            if ($data[$column] ?? false) {
                $this->{'set' . ucwords($column)}($data[$column]);
                unset($data[$column]);
            }
        }
        
        if (empty($data)) {
            return;
        }
        
        foreach ($this->getChildren() as $child => $value) {
            if (($data[$child] ?? false) && $childClass = $this->getChildClass($child)) {
                $updatedChild = [];
                foreach ($data[$child] as $childData) {
                    /** @var BCFModel $childModel */
                    $childModel = new $childClass();
                    $childModel->setAttributes($childData);
                    
                    $updatedChild[] = $childModel;
                }
                
                $this->{'set' . ucwords($child)}($updatedChild);
            }
        }
    }
    
    public function toArray($columns = null, $withChild = false)
    {
        $data = [];
        foreach ($this->columnMap() as $column) {
            $data[$column] = $this->{'get' . ucfirst($column)}();
        }
        
        if ($withChild) {
            foreach ($this->getChildren() as $key => $child) {
                if ($child instanceof Model\ResultsetInterface) {
                    $data[$key] = [];
                    /** @var Model $mdl */
                    foreach ($child as $mdl) {
                        $data[$key][] = $mdl->toArray(null, $withChild);
                    }
                } else {
                    $data[$key] = $child->toArray(null, $withChild);
                }
            }
        }
        
        return $data;
    }
    
    // ===================== ================= Abstract functions =================== ====================== ===========
    /**
     * @return array
     */
    abstract public function columnMap();
    
    /**
     * @return Model[]|Model\ResultsetInterface[]
     */
    abstract public function getChildren(): array;
    // ===================== ================= Abstract functions =================== ====================== ===========
}
