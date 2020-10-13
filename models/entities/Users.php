<?php

namespace app\models\entities;

use app\models\DbModel;

class Users extends DataEntity
{
    protected $id;
    protected $login;
    protected $pass;

    public $state = [
        'login' => false,
        'pass' => false,
    ];

    /**
     * Users constructor.
     * @param $login
     * @param $pass
     */
    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

}