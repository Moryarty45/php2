<?php


namespace app\engine;


class Session
{
    protected function getSession()
    {
        if (empty($_SESSION)) {
            session_start();
        }
    }

    public function get($name)
    {
        $this->getSession();

        if (empty($_SESSION[$name])) {
            return null;
        }

        return $_SESSION[$name];
    }

    public function set($name, $value)
    {
        $this->getSession();

        $_SESSION[$name] = $value;
    }

}