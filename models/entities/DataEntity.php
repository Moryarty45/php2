<?php


namespace app\models\entities;


use app\models\Model;

class DataEntity extends Model
{
    public $state = [];

    public  function clearState()
    {
        foreach ($this->state as $key => $value){
            if ($value) {
                $this->state[$key] = false;
            }
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
        $this->state[$name] = true;
    }

}