<?php

namespace app\models\repositories;


use app\models\Repository;
use app\models\entities\Users;

class UsersRepository extends Repository
{

    public function isAuth()
    {
        if (isset($_COOKIE["hash"])) {
            $hash = $_COOKIE["hash"];

            $user = $this->getWhereOne('hash', $hash);
            $userName = $user->login;
            if (!empty($userName)) {
                $_SESSION['login'] = $userName;
            }
        }
        return isset($_SESSION['login']) ? true: false;
    }

    public function getName()
    {
        return $_SESSION['login'];
    }

    public function auth($login, $pass, $savePass)
    {
        $user = $this->getWhereOne('login', $login);

        if (password_verify($pass,$user->pass)){
            $_SESSION['login'] = $login;
            if ($savePass) {
                $hash = uniqid(rand(), true);
                setcookie("hash", $hash, time() + 3600, "/");
                $user->hash = $hash;
                $this->save($user);
            }
            return true;
        }
        return false;
    }

    public function logout()
    {
        if (isset($_COOKIE["hash"])) {
            setcookie("hash", "", time() - 3600, "/");
        }
        return isset($_SESSION['login']) ? true: false;

    }

    public function getTableName()
    {
        return "users";
    }

    public function getEntityClass()
    {
        return Users::class;
    }

}