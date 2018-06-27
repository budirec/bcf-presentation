<?php

namespace BCF\Controllers;

use BCF\Models\Slide;
use Phalcon\Mvc\Model\Exception;

class SlidesController extends Core\BCFController
{
    /**
     * @SWG\Swagger(
     *   schemes={"http"},
     *   host="admin.presentation.bcf",
     *   basePath="/api"
     * )
     */
    
    /**
     * @SWG\Info(title="BCF Presentation", version="0.1")
     */
    
    /**
     * @SWG\Get(
     *   path="/slides",
     *   @SWG\Response(response="200", description="List of all available slides",@SWG\Schema(
     *       ref="#/definitions/Slide"
     *     ))
     * )
     *
     * @SWG\Post(
     *     path="/slides",
     *     @SWG\Parameter(name="body",
     *         in="body",
     *         description="Pet object that needs to be added to the store",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/Slide"),),
     *   @SWG\Response(
     *     response="200",
     *     description="Slide with all it's relations",
     *     @SWG\Schema(
     *       ref="#/definitions/Slide"
     *     )
     *   )
     * )
     */
    public function indexAction()
    {
        if ($this->request->isPost() || $this->request->isPut()) {
            $data = $this->create();
        } elseif ($this->request->isGet()) {
            /** @var Slide[] $slides */
            $slides = Slide::find();
            
            $data = [];
            foreach ($slides as $slide) {
                $data[] = $slide->toArray();
            }
        } else {
            $data = $this->delete();
        }
        
        return $this->response($data);
    }
    
    /**
     * @SWG\Get(
     *     path="/slides/detail/{name}",
     *     @SWG\Parameter(
     *     in="path",
     *     name="name",
     *     description="Slide's name",
     *     required=true
     *   ),
     *   @SWG\Response(
     *     response="200",
     *     description="Slide with all it's relations",
     *     @SWG\Schema(
     *       ref="#/definitions/Slide"
     *     )
     *   )
     * )
     */
    public function detailAction($name)
    {
        /** @var Slide $slide */
        $slide = Slide::findFirstByName($name);
        
        $data = $slide->toArray(null, true);
        
        return $this->response($data);
    }
    
    /**
     *
     */
    private function create()
    {
        $data = $this->request->getJsonRawBody(true);
        $slide = new Slide();
        $slide->setAttributes($data);
        
        if (!$slide->save()) {
            throw new Exception($slide->getMessages(), 500);
        }
        
        return $slide->toArray(null, true);
    }
    
    private function delete()
    {
        
    }
}
