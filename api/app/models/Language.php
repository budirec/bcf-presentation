<?php

class Language extends BCF\Models\Generated\
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="language_id", type="integer", length=3, nullable=false)
     */
    public $language_id;

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
        $this->setSource("language");
        $this->hasMany('language_id', 'LanguageLog', 'language_id', ['alias' => 'LanguageLog']);
        $this->hasMany('language_id', 'Lyric', 'language_id', ['alias' => 'Lyric']);
        $this->hasMany('language_id', 'SongLanguage', 'language_id', ['alias' => 'SongLanguage']);
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

}
