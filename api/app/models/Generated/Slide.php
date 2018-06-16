<?php

namespace BCF\Models\Generated;

class Slide extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
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
        $this->setSource("slide");
        $this->hasMany('slide_id', 'Section', 'slide_id', ['alias' => 'Section']);
        $this->hasMany('slide_id', 'SlideLog', 'slide_id', ['alias' => 'SlideLog']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'slide';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Slide[]|Slide|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Slide|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
