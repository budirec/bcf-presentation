<?php

namespace BCF\Models;

/**
 * SongSongStructure
 * 
 * @package BCF\Models
 * @autogenerated by Phalcon Developer Tools
 * @date 2018-06-20, 19:43:54
 */
class SongSongStructure extends Base\BCFModel
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="song_song_structure_id", type="integer", length=20, nullable=false)
     */
    protected $songSongStructureId;

    /**
     *
     * @var integer
     * @Column(column="song_id", type="integer", length=20, nullable=false)
     */
    protected $songId;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=255, nullable=false)
     */
    protected $name;

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
     * Method to set the value of field songSongStructureId
     *
     * @param integer $songSongStructureId
     * @return $this
     */
    public function setSongSongStructureId($songSongStructureId)
    {
        $this->songSongStructureId = $songSongStructureId;

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
     * Returns the value of field songSongStructureId
     *
     * @return integer
     */
    public function getSongSongStructureId()
    {
        return $this->songSongStructureId;
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
        $this->setSource("song_song_structure");
        $this->hasMany('songSongStructureId', 'BCF\Models\Lyric', 'songSongStructureId', ['alias' => 'Lyric']);
        $this->belongsTo('songId', 'BCF\Models\Song', 'songId', ['alias' => 'Song']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'song_song_structure';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SongSongStructure[]|SongSongStructure|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SongSongStructure|\Phalcon\Mvc\Model\ResultInterface
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
            'song_song_structure_id' => 'songSongStructureId',
            'song_id' => 'songId',
            'name' => 'name',
            'created_at' => 'createdAt',
            'modified_at' => 'modifiedAt'
        ];
    }

    public function getChildren(): array
    {
        return [];
    }
}
