<?php

namespace app\controllers;


use app\models\entities\Product;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{

    public function actionCatalog()
    {
        $page = $_GET['page'];
        If (!isset($page)){
            $page = 0;
        }

        $from = 0;

        $to = $page * 2 + 2;
        $catalog = (new ProductRepository())->getLimit($from,$to);
        echo $this->render('catalog', ['catalog' => $catalog, 'page'=> ++$page]);
    }

    public function actionApiCatalog()
    {
        $catalog = (new ProductRepository())->getAll();
        echo json_encode($catalog, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = (new ProductRepository())->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }


}