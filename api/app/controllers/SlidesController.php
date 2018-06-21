<?php

namespace BCF\Controllers;

use BCF\Models\Checkpoint;
use BCF\Models\Section;
use BCF\Models\Slide;

class SlidesController extends Core\BCFController
{
    public function indexAction()
    {
        /** @var Slide[] $slides */
        $slides = Slide::find();
        
        $data = [];
        foreach ($slides as $slide) {
            $data[] = $slide->toArray();
        }
        
        return $this->response($data);
    }
    
    public function detailAction($name)
    {
        /** @var Slide $slide */
        $slide = Slide::findFirstByName($name);
        
        $data = $slide->toArray(null, true);
        
        return $this->response($data);
    }
}
