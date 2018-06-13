<?php

class SongLanguage extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="song_language_id", type="integer", length=20, nullable=false)
     */
    public $song_language_id;

    /**
     *
     * @var integer
     * @Column(column="song_id", type="integer", length=20, nullable=false)
     */
    public $song_id;

    /**
     *
     * @var integer
     * @Column(column="language_id", type="integer", length=3, nullable=false)
     */
    public $language_id;

    /**
     *
     * @var string
     * @Column(column="title", type="string", length=255, nullable=false)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(column="writer", type="string", length=255, nullable=false)
     */
    public $writer;

    /**
     *
     * @var integer
     * @Column(column="singable", type="integer", length=1, nullable=false)
     */
    public $singable;

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
        $this->setSource("song_language");
        $this->hasMany('song_language_id', 'SongLanguageLog', 'song_language_id', ['alias' => 'SongLanguageLog']);
        $this->belongsTo('song_id', '\Song', 'song_id', ['alias' => 'Song']);
        $this->belongsTo('language_id', '\Language', 'language_id', ['alias' => 'Language']);
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

}
