<?php


namespace app\models\repositories;


use app\engine\Db;
use app\models\entities\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{

    public function getTableName()
    {
        return "basket";
    }

    public function getEntityClass()
    {
        return Basket::class;
    }
    public function deleteBasket($id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id and session_id = :session_id";
        return Db::getInstance()->execute($sql, [":id" => $id, ":session_id" => session_id()]);
    }

    public function getBasket()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT 
                    basket.id as basket_id, 
                    goods.id as good_id, 
                    goods.name as name, 
                    goods.price as price,
                    goods.image as image 
                FROM 
                    `{$tableName}`, `products` as goods
                WHERE 
                    basket.goods_id=goods.id AND session_id = :session_id AND NOT basket.framed";

        return Db::getInstance()->queryAll($sql,['session_id' => session_id()]);
    }

}