<?php

class Page extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="page_id", type="integer", length=20, nullable=false)
     */
    public $page_id;

    /**
     *
     * @var integer
     * @Column(column="checkpoint_id", type="integer", length=20, nullable=false)
     */
    public $checkpoint_id;

    /**
     *
     * @var integer
     * @Column(column="layout_id", type="integer", length=5, nullable=false)
     */
    public $layout_id;

    /**
     *
     * @var string
     * @Column(column="content", type="string", nullable=false)
     */
    public $content;

    /**
     *
     * @var integer
     * @Column(column="number", type="integer", length=3, nullable=false)
     */
    public $number;

    /**
     *
     * @var string
     * @Column(column="background", type="string", length=255, nullable=true)
     */
    public $background;

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
        $this->setSource("page");
        $this->hasMany('page_id', 'PageLog', 'page_id', ['alias' => 'PageLog']);
        $this->belongsTo('checkpoint_id', '\Checkpoint', 'checkpoint_id', ['alias' => 'Checkpoint']);
        $this->belongsTo('layout_id', '\Layout', 'layout_id', ['alias' => 'Layout']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'page';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Page[]|Page|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Page|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
