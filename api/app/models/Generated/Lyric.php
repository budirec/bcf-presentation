<?php

namespace BCF\Models\Generated;

class Lyric extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="lyric_id", type="integer", length=20, nullable=false)
     */
    public $lyric_id;

    /**
     *
     * @var integer
     * @Column(column="song_song_structure_id", type="integer", length=20, nullable=false)
     */
    public $song_song_structure_id;

    /**
     *
     * @var integer
     * @Column(column="language_id", type="integer", length=3, nullable=false)
     */
    public $language_id;

    /**
     *
     * @var integer
     * @Column(column="number", type="integer", length=3, nullable=false)
     */
    public $number;

    /**
     *
     * @var string
     * @Column(column="content", type="string", nullable=false)
     */
    public $content;

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
        $this->setSource("lyric");
        $this->hasMany('lyric_id', 'LyricLog', 'lyric_id', ['alias' => 'LyricLog']);
        $this->belongsTo('song_song_structure_id', '\SongSongStructure', 'song_song_structure_id',
            ['alias' => 'SongSongStructure']);
        $this->belongsTo('language_id', '\Language', 'language_id', ['alias' => 'Language']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'lyric';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Lyric[]|Lyric|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Lyric|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
