<?php

namespace BCF\Models;

/**
 * Language
 *
 * @package BCF\Models
 * @autogenerated by Phalcon Developer Tools
 * @date 2018-06-20, 19:43:54
 *
 * @SWG\Definition()
 */
class Language extends Base\BCFModel
{
    
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="language_id", type="integer", length=3, nullable=false)
     *
     * @SWG\Property()
     */
    protected $languageId;
    
    /**
     *
     * @var string
     * @Column(column="name", type="string", length=255, nullable=false)
     *
     * @SWG\Property()
     */
    protected $name;
    
    /**
     *
     * @var string
     * @Column(column="created_at", type="string", nullable=false)
     *
     * @SWG\Property()
     */
    protected $createdAt;
    
    /**
     *
     * @var string
     * @Column(column="modified_at", type="string", nullable=true)
     *
     * @SWG\Property()
     */
    protected $modifiedAt;
    
    /**
     * Method to set the value of field languageId
     *
     * @param integer $languageId
     * @return $this
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
        
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
     * Returns the value of field languageId
     *
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->languageId;
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
        $this->setSource("language");
        $this->hasMany('languageId', 'BCF\Models\Lyric', 'languageId', ['alias' => 'Lyric']);
        $this->hasMany('languageId', 'BCF\Models\SongLanguage', 'languageId', ['alias' => 'SongLanguage']);
    
        parent::initialize();
    }
    
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'language';
    }
    
    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Language[]|Language|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }
    
    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Language|\Phalcon\Mvc\Model\ResultInterface
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
            'language_id' => 'languageId',
            'name' => 'name',
            'created_at' => 'createdAt',
            'modified_at' => 'modifiedAt',
        ];
    }
    
    public function getChildren(): array
    {
        return [];
    }
}
