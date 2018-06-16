<?php

namespace BCF\Models\Generated;

class Section extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="section_id", type="integer", length=20, nullable=false)
     */
    public $section_id;

    /**
     *
     * @var integer
     * @Column(column="slide_id", type="integer", length=20, nullable=false)
     */
    public $slide_id;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=255, nullable=false)
     */
    public $name;

    /**
     *
     * @var integer
     * @Column(column="number", type="integer", length=3, nullable=false)
     */
    public $number;

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
        $this->setSource("section");
        $this->hasMany('section_id', 'Checkpoint', 'section_id', ['alias' => 'Checkpoint']);
        $this->belongsTo('slide_id', '\Slide', 'slide_id', ['alias' => 'Slide']);
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

}
