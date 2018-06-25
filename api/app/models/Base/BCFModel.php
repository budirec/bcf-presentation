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
    
    public function setAttributes(array $data)
    {
        foreach ($this->columnMap() as $column) {
            if ($data[$column] ?? false) {
                $this->set{ucwords($column)}($data[$column]);
                unset($data[$column]);
            }
        }
        
        if (empty($data)) {
            return;
        }
        
        foreach ($this->getChildren() as $child => $value) {
            if ($data[$child] ?? false) {
                
            }
        }
    }
    
    /**
     * @return array
     */
    abstract public function columnMap();
    
    /**
     * @return Model[]|Model\ResultsetInterface[]
     */
    abstract public function getChildren(): array;
}
