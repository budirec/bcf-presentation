<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 6/18/18
 * Time: 9:22 PM
 */

namespace BCF\Controllers\Core;


use Phalcon\Http\Response;

class BCFController extends \Phalcon\Mvc\Controller
{
    public function response($data, $format = 'json')
    {
        $response = new Response();
        
        switch ($format) {
            case 'json':
            default:
                $response->setJsonContent($data);
        }
        
        return $response;
    }
}
