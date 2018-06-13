<?php

class SongSongStructure extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="song_song_structure_id", type="integer", length=20, nullable=false)
     */
    public $song_song_structure_id;

    /**
     *
     * @var integer
     * @Column(column="song_id", type="integer", length=20, nullable=false)
     */
    public $song_id;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=255, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="created_at", type="string", nullable=false)
     */
    public $created_at;

    /**
     *
     * @var string
     * @Column(column="modified_at", type="string", nullable=true)
     */
    public $modified_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("bcf_presentation");
        $this->setSource("song_song_structure");
        $this->hasMany('song_song_structure_id', 'Lyric', 'song_song_structure_id', ['alias' => 'Lyric']);
        $this->hasMany('song_song_structure_id', 'SongSongStructureLog', 'song_song_structure_id', ['alias' => 'SongSongStructureLog']);
        $this->belongsTo('song_id', '\Song', 'song_id', ['alias' => 'Song']);
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

}
