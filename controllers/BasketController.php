<?php

namespace app\controllers;


use app\models\entities\Basket;
use app\models\repositories\BasketRepository;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $basket = (new BasketRepository())->getBasket();
        echo $this->render('basket', ['basket' => $basket]);
    }

    public function actionAddToBasket()
    {
        $id = $this->request->getParams()['id'];

        (new BasketRepository())->save(new Basket(session_id(),$id));

        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => (new BasketRepository())->getCountWhere('session_id', session_id()) ]);
        die();
    }

    public function actionDeleteToBasket()
    {
        $id = $this->request->getParams()['id'];

        (new BasketRepository())->deleteBasket($id);
        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => (new BasketRepository())->getCountWhere('session_id', session_id()) ]);
        die();
    }
}