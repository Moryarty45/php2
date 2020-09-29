<?php

trait Singleton
{
    static private $_instance = null;

    private function __construct()
    {
    }

    static public function get_instance()
    {
        if (self::$_instance instanceof self) {
            return self::$_instance;
        }
        return self::$_instance = new self;
    }

    private function __clone()
    {
    }
}