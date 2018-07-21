<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 6/30/18
 * Time: 1:23 AM
 */

namespace BCF\Controllers;

use BCF\Library\Utils\DBHelper;
use BCF\Library\Utils\HttpException;
use BCF\Models\Song;

use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class SongsController extends Core\BCFController
{
    /**
     * @SWG\Get(
     *   path="/songs",
     *   @SWG\Response(
     *     response="200",
     *     description="List of all available songs",
     *     @SWG\Schema(ref="#/definitions/Song")
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
     *   path="/songs",
     *   @SWG\Parameter(name="body",
     *     in="body",
     *     description="Song object that needs to be added",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/Song"),
     *   ),
     *   @SWG\Response(
     *     response="200",
     *     description="Song with all relations",
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
            
            $songs = new PaginatorModel(
                [
                    'data' => Song::find($criteria),
                    'limit' => $pagination->perPage,
                    'page' => $pagination->page,
                ]
            );
            
            $data = [];
            foreach ($songs->getPaginate()->items as $song) {
                $data[] = $song->toArray();
            }
        } else {
            $data = $this->delete();
        }
        
        return $this->response($data);
    }
    
    /**
     * @param $songId
     * @return \Phalcon\Http\Response
     * @throws HttpException
     *
     * @SWG\Get(
     *   path="/songs/detail/{songId}",
     *   @SWG\Parameter(
     *     in="path",
     *     name="songId",
     *     description="Song ID",
     *     required=true
     *   ),
     *   @SWG\Response(
     *     response="200",
     *     description="Song with all it's relations",
     *     @SWG\Schema(ref="#/definitions/Song")
     *   )
     * )
     */
    public function detailAction($songId)
    {
        /** @var Song $song */
        $song = Song::findFirstBySongId($songId);
        if ($song) {
            $data = $song->toArray(null, true);
            return $this->response($data);
        }
        
        throw new HttpException(HttpException::HTTP_NOT_FOUND, 'Slide not found');
    }
    
    private function create()
    {
        $data = $this->request->getJsonRawBody(true);
        $song = new Song();
        $song->setAttributes($data);
        
        if (!$song->save()) {
            throw new HttpException(HttpException::HTTP_INTERNAL_SERVER_ERROR, $song->getMessages());
        }
        
        return $song->toArray(null, true);
    }
}
