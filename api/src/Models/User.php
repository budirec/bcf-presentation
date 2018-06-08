<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 6/7/18
 * Time: 11:26 PM
 */

namespace BCF\Models;


class User
{
    public function __construct(array $attributes)
    {

    }

    protected $user_id;
    protected $username;
    protected $email;
    protected $password;
    /** @var \DateTime */
    protected $created_at;
    /** @var \DateTime */
    protected $updateded_at;
}