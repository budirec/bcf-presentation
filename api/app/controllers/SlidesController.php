<?php

namespace BCF\Controllers;

use BCF\Library\Utils\DBHelper;
use BCF\Library\Utils\HttpException;
use BCF\Models\Slide;

use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class SlidesController extends Core\BCFController
{
    /**
     * @SWG\Get(
     *   path="/slides",
     *   @SWG\Response(
     *     response="200",
     *     description="List of all available slides",
     *     @SWG\Schema(ref="#/definitions/Slide")
     *   ),
     *   @SWG\Parameter(
     *     name="pagination",
     *     in="query",
     *   ),
     *   @SWG\Parameter(
     *     name="order",
     *     in="query",
     *   ),
     *   @SWG\Parameter(
     *     name="search",
     *     in="query",
     *   )
     * )
     *
     * @SWG\Post(
     *   path="/slides",
     *   @SWG\Parameter(name="body",
     *     in="body",
     *     description="Pet object that needs to be added to the store",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/Slide"),
     *   ),
     *   @SWG\Response(
     *     response="200",
     *     description="Slide with all it's relations",
     *     @SWG\Schema(ref="#/definitions/Slide")
     *   )
     * )
     */
    public function indexAction()
    {
        if ($this->request->isPost() || $this->request->isPut()) {
            $data = $this->create();
        } elseif ($this->request->isGet()) {
            $search = json_decode($this->request->getQuery('search'));
            
            $order = json_decode($this->request->getQuery('order'));
            if (!$order) {
                $order = [
                    'slideId DESC',
                ];
            }
            
            $pagination = json_decode($this->request->getQuery('pagination'));
            if (!$pagination) {
                $pagination = (object)[
                    'page' => 1,
                    'perPage' => 2,
                ];
            }
            
            $criteria = [];
            if ($search) {
                $criteria = DBHelper::createWhere($search);
            }
            $criteria['order'] = implode(',', $order);
            
            $slides = new PaginatorModel(
                [
                    'data' => Slide::find($criteria),
                    'limit' => $pagination->perPage,
                    'page' => $pagination->page,
                ]
            );
            
            $data = [];
            /** @var Slide $slide */
            foreach ($slides->getPaginate()->items as $slide) {
                $data[] = $slide->toArray();
            }
        } else {
            $data = $this->delete();
        }
        
        return $this->response($data);
    }
    
    /**
     * @param $name
     * @return \Phalcon\Http\Response
     * @throws HttpException
     *
     * @SWG\Get(
     *   path="/slides/detail/{name}",
     *   @SWG\Parameter(
     *     in="path",
     *     name="name",
     *     description="Slide's name",
     *     required=true
     *   ),
     *   @SWG\Response(
     *     response="200",
     *     description="Slide with all it's relations",
     *     @SWG\Schema(ref="#/definitions/Slide")
     *   )
     * )
     */
    public function detailAction($name)
    {
        /** @var Slide $slide */
        $slide = Slide::findFirstByName($name);
        if ($slide) {
            $data = $slide->toArray(null, true);
            return $this->response($data);
        }
        
        throw new HttpException(HttpException::HTTP_NOT_FOUND, 'Slide not found');
    }
    
    private function create()
    {
        $data = $this->request->getJsonRawBody(true);
        $slide = new Slide();
        $slide->setAttributes($data);
        
        if (!$slide->save()) {
            throw new HttpException(HttpException::HTTP_INTERNAL_SERVER_ERROR, $slide->getMessages());
        }
        
        return $slide->toArray(null, true);
    }
    
    private function delete()
    {
        
    }
}
