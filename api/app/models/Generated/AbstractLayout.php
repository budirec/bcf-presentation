<?php

namespace BCF\Models\Generated;

/**
 * AbstractLayout
 * 
 * @package BCF\Models\Generated
 * @autogenerated by Phalcon Developer Tools
 * @date 2018-06-16, 06:55:18
 */
abstract class AbstractLayout extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="layout_id", type="integer", length=5, nullable=false)
     */
    protected $layoutId;

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
     * Method to set the value of field layoutId
     *
     * @param integer $layoutId
     * @return $this
     */
    public function setLayoutId($layoutId)
    {
        $this->layoutId = $layoutId;

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
     * Returns the value of field layoutId
     *
     * @return integer
     */
    public function getLayoutId()
    {
        return $this->layoutId;
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
        $this->setSource("layout");
        $this->hasMany('layoutId', 'BCF\Models\Generated\LayoutLog', 'layoutId', ['alias' => 'LayoutLog']);
        $this->hasMany('layoutId', 'BCF\Models\Generated\Page', 'layoutId', ['alias' => 'Page']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'layout';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AbstractLayout[]|AbstractLayout|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AbstractLayout|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
