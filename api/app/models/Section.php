<?php

namespace BCF\Models;

/**
 * Section
 *
 * @package BCF\Models
 * @autogenerated by Phalcon Developer Tools
 * @date 2018-06-20, 19:43:54
 */
class Section extends Base\BCFModel
{
    
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="section_id", type="integer", length=20, nullable=false)
     */
    protected $sectionId;
    
    /**
     *
     * @var integer
     * @Column(column="slide_id", type="integer", length=20, nullable=false)
     */
    protected $slideId;
    
    /**
     *
     * @var string
     * @Column(column="name", type="string", length=255, nullable=false)
     */
    protected $name;
    
    /**
     *
     * @var integer
     * @Column(column="number", type="integer", length=3, nullable=false)
     */
    protected $number;
    
    /**
     *
     * @var string
     * @Column(column="created_at", type="string", nullable=false)
     */
    protected $createdAt;
    
    /**
     *
     * @var string
     * @Column(column="modified_at", type="string", nullable=true)
     */
    protected $modifiedAt;
    
    /**
     * Method to set the value of field sectionId
     *
     * @param integer $sectionId
     * @return $this
     */
    public function setSectionId($sectionId)
    {
        $this->sectionId = $sectionId;
        
        return $this;
    }
    
    /**
     * Method to set the value of field slideId
     *
     * @param integer $slideId
     * @return $this
     */
    public function setSlideId($slideId)
    {
        $this->slideId = $slideId;
        
        return $this;
    }
    
    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * Method to set the value of field number
     *
     * @param integer $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;
        
        return $this;
    }
    
    /**
     * Method to set the value of field createdAt
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        
        return $this;
    }
    
    /**
     * Method to set the value of field modifiedAt
     *
     * @param string $modifiedAt
     * @return $this
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
        
        return $this;
    }
    
    /**
     * Returns the value of field sectionId
     *
     * @return integer
     */
    public function getSectionId()
    {
        return $this->sectionId;
    }
    
    /**
     * Returns the value of field slideId
     *
     * @return integer
     */
    public function getSlideId()
    {
        return $this->slideId;
    }
    
    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Returns the value of field number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }
    
    /**
     * Returns the value of field createdAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Returns the value of field modifiedAt
     *
     * @return string
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }
    
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("bcf_presentation");
        $this->setSource("section");
        $this->hasMany('sectionId', 'BCF\Models\Checkpoint', 'sectionId', ['alias' => 'Checkpoint']);
        $this->belongsTo('slideId', 'BCF\Models\Slide', 'slideId', ['alias' => 'Slide']);
    }
    
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'section';
    }
    
    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Section[]|Section|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }
    
    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Section|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
    
    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'section_id' => 'sectionId',
            'slide_id' => 'slideId',
            'name' => 'name',
            'number' => 'number',
            'created_at' => 'createdAt',
            'modified_at' => 'modifiedAt',
        ];
    }
    
    public function getChildren(): array
    {
        return [
            'checkpoints' => $this->getCheckpoint(),
        ];
    }
}
