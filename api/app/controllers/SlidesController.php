<?php

namespace BCF\Controllers;

use BCF\Models\Slide;

class SlidesController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        echo json_encode(Slide::find());
    }

}
