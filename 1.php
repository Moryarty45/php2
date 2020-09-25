<?php

abstract class Product
{
    public $price;
    public $name;

    protected static $profit;

    public function __construct($name,$price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function buy($count)
    {
        static::$profit = static::$profit + $this->price * $count;
    }

    static function printProfit()
    {
        echo 'общий объем продаж ' . static::$profit;
    }
}

class PieceProduct extends Product
{
}

class DigitalProduct extends Product
{
    public function __construct(PieceProduct $pieceProduct)
    {
        $this->name = $pieceProduct->name;
        $this->price = $pieceProduct->price / 2;
    }
}

class WeightProduct extends Product
{
    private function getPrice($count)
    {
        if ($count < 1){
            return $this->price * 1.2;
        } elseif ($count < 10){
            return $this->price;
        } else{
            return $this->price * 0.8;
        }
    }
    public function buy($count)
    {
        parent::$profit = parent::$profit + $this->getPrice($count) * $count;
    }
}

$book = new PieceProduct('Книга', 100);
$digitalBook = new DigitalProduct($book);
$apple = new WeightProduct('Яблоки',50);

// Покупаем
$book->buy(1);
$digitalBook->buy(1);
$apple->buy(0.5);
$apple->buy(3);

// Выводим продажи
Product::printProfit();