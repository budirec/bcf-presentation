<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 6/7/18
 * Time: 11:24 PM
 */

namespace BCF\Models;


abstract class Mappper
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    protected $db;
}