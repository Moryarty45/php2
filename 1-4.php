<?php
class Price
{
    public $rp; // цена
    public $currency; // валюта

    public function __construct($rp, $currency = 'USD') {
        $this->rp = $rp;
        $this->currency = $currency;
    }

    // метод получения ценника с ценой и валютой
    public function getRspTag() {
        return $this->rsp." ".$this->currency;
    }
}

// класс-наследник ценника со скидкой
class Discount extends Price
{
    // скидка, %
    public $discount;

    public function __construct($rp, $discount, $currency = 'USD')
    {
        parent::__construct($rp, $currency);
        $this->discount = $discount;
    }

    // метод получения цены со скидкой
    public function getDiscountedPrice() {
        return $this->rp * (1 - $this->discount / 100);
    }

    // метод получения ценника со скидкой
    public function getDiscountTag() {
        return $this->rsp." ".$this->currency."<br>".$this->discount." ".$this->getDiscountedPrice();
    }
}

// класс ценника на развес
class ByWeight extends Price
{
    // вес товара
    public $weight;
    // единица измерения
    public $unit;

    public function __construct($rp, $weight, $currency = 'USD', $unit = 'pound')
    {
        parent::__construct($rp, $currency);
        $this->weight = $weight;
        $this->unit = $unit;
    }

    // метод получения цены взвешенного товара
    public function getWeightedPrice() {
        return $this->rp * $this->weight;
    }

    // метод получения ценника на развес
    public function getByWeightTag() {
        return $this->rsp." per ".$this->unit." ".$this->weight." ".$this->unit." ".$this->getWeightedPrice();
    }
}