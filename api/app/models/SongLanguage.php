<?php

namespace BCF\Models;

/**
 * SongLanguage
 *
 * @package BCF\Models
 * @autogenerated by Phalcon Developer Tools
 * @date 2018-06-20, 19:43:54
 *
 * @SWG\Definition()
 */
class SongLanguage extends Base\BCFModel
{
    
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="song_language_id", type="integer", length=20, nullable=false)
     *
     * @SWG\Property()
     */
    protected $songLanguageId;
    
    /**
     *
     * @var integer
     * @Column(column="song_id", type="integer", length=20, nullable=false)
     *
     * @SWG\Property()
     */
    protected $songId;
    
    /**
     *
     * @var integer
     * @Column(column="language_id", type="integer", length=3, nullable=false)
     *
     * @SWG\Property()
     */
    protected $languageId;
    
    /**
     *
     * @var string
     * @Column(column="title", type="string", length=255, nullable=false)
     *
     * @SWG\Property()
     */
    protected $title;
    
    /**
     *
     * @var string
     * @Column(column="writer", type="string", length=255, nullable=false)
     *
     * @SWG\Property()
     */
    protected $writer;
    
    /**
     *
     * @var integer
     * @Column(column="singable", type="integer", length=1, nullable=false)
     *
     * @SWG\Property()
     */
    protected $singable;
    
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
     * Method to set the value of field songLanguageId
     *
     * @param integer $songLanguageId
     * @return $this
     */
    public function setSongLanguageId($songLanguageId)
    {
        $this->songLanguageId = $songLanguageId;
        
        return $this;
    }
    
    /**
     * Method to set the value of field songId
     *
     * @param integer $songId
     * @return $this
     */
    public function setSongId($songId)
    {
        $this->songId = $songId;
        
        return $this;
    }
    
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
     * Method to set the value of field title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * Method to set the value of field writer
     *
     * @param string $writer
     * @return $this
     */
    public function setWriter($writer)
    {
        $this->writer = $writer;
        
        return $this;
    }
    
    /**
     * Method to set the value of field singable
     *
     * @param integer $singable
     * @return $this
     */
    public function setSingable($singable)
    {
        $this->singable = $singable;
        
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
     * Returns the value of field songLanguageId
     *
     * @return integer
     */
    public function getSongLanguageId()
    {
        return $this->songLanguageId;
    }
    
    /**
     * Returns the value of field songId
     *
     * @return integer
     */
    public function getSongId()
    {
        return $this->songId;
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
     * Returns the value of field title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Returns the value of field writer
     *
     * @return string
     */
    public function getWriter()
    {
        return $this->writer;
    }
    
    /**
     * Returns the value of field singable
     *
     * @return integer
     */
    public function getSingable()
    {
        return $this->singable;
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
        $this->setSource("song_language");
        $this->belongsTo('songId', 'BCF\Models\Song', 'songId', ['alias' => 'Song']);
        $this->belongsTo('languageId', 'BCF\Models\Language', 'languageId', ['alias' => 'Language']);
    
        parent::initialize();
    }
    
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'song_language';
    }
    
    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SongLanguage[]|SongLanguage|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }
    
    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SongLanguage|\Phalcon\Mvc\Model\ResultInterface
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
            'song_language_id' => 'songLanguageId',
            'song_id' => 'songId',
            'language_id' => 'languageId',
            'title' => 'title',
            'writer' => 'writer',
            'singable' => 'singable',
            'created_at' => 'createdAt',
            'modified_at' => 'modifiedAt',
        ];
    }
    
    public function getChildren(): array
    {
        return [];
    }
}
