<?php


namespace app\controllers;

use app\models\repositories\UsersRepository;
use app\models\entities\Users;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = $this->request->getParams()['login'];
        $pass = $this->request->getParams()['pass'];
        $savePass = $this->request->getParams()['savePass'];
        if (!(new UsersRepository())->auth($login, $pass, $savePass)) {
            Die("Не верный пароль!");
        } else
            header("Location: /");
        exit();
    }

    public function actionLogout()
    {
        session_destroy();
        (new UsersRepository())->logout();
        header("Location: /");
        exit();
    }

}