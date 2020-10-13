<?php


namespace app\tests;

use app\models\entities\Basket;
use app\models\entities\Product;
use app\models\entities\Users;
use PHPUnit\Framework\TestCase;

class ClassTest extends TestCase
{
    /**
     * @dataProvider provideData
     */

    public function testClass($instance)
    {
        // Принадлежит классу Model
        $this->assertInstanceOf(\app\models\Model::Class,$instance);
        // Есть массив state
        $this->assertIsArray($instance->state);
        // Элементы state присутствукют в самом классе
        foreach ($instance->state as $key => $value){
                $this->assertClassHasAttribute($key, get_class($instance));
        }
    }

    public function provideData()
    {
    return[
        [new Product()],
        [new Users()],
        [new Basket()],
    ];

    }
}