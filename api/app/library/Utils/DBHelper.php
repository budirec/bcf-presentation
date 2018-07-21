<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 7/20/18
 * Time: 9:58 PM
 */

namespace BCF\Library\Utils;


class DBHelper
{
    public static function createWhere(array $search, array $criteria = null)
    {
        if (!$criteria) {
            $criteria = [];
        }
        
        $bind = [];
        $criteria['conditions'] = self::processSearch($search, $bind);
        $criteria['bind'] = $bind;
        
        return $criteria;
    }
    
    private static function processSearch($search, &$bind)
    {
        $conditions = '';
        foreach ($search as $x) {
            if (is_array($x)) {
                $conditions .= '(' . self::processSearch($x, $bind) . ')';
            } else {
                $conditions .= "{$x->column} {$x->operator} :{$x->column}:";
                $bind[$x->column] = $x->value;
            }
        }
        
        return $conditions;
    }
}
