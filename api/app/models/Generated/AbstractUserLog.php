<?php

namespace BCF\Models\Generated;

/**
 * AbstractUserLog
 * 
 * @package BCF\Models\Generated
 * @autogenerated by Phalcon Developer Tools
 * @date 2018-06-16, 06:55:18
 */
abstract class AbstractUserLog extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="user_log_id", type="integer", length=20, nullable=false)
     */
    protected $userLogId;

    /**
     *
     * @var integer
     * @Column(column="user_id", type="integer", length=20, nullable=false)
     */
    protected $userId;

    /**
     *
     * @var string
     * @Column(column="old", type="string", nullable=false)
     */
    protected $old;

    /**
     *
     * @var string
     * @Column(column="created_at", type="string", nullable=false)
     */
    protected $createdAt;

    /**
     * Method to set the value of field userLogId
     *
     * @param integer $userLogId
     * @return $this
     */
    public function setUserLogId($userLogId)
    {
        $this->userLogId = $userLogId;

        return $this;
    }

    /**
     * Method to set the value of field userId
     *
     * @param integer $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Method to set the value of field old
     *
     * @param string $old
     * @return $this
     */
    public function setOld($old)
    {
        $this->old = $old;

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
     * Returns the value of field userLogId
     *
     * @return integer
     */
    public function getUserLogId()
    {
        return $this->userLogId;
    }

    /**
     * Returns the value of field userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Returns the value of field old
     *
     * @return string
     */
    public function getOld()
    {
        return $this->old;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("bcf_presentation");
        $this->setSource("user_log");
        $this->belongsTo('userId', 'BCF\Models\Generated\User', 'userId', ['alias' => 'User']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AbstractUserLog[]|AbstractUserLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AbstractUserLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
