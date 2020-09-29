<?php
require_once(TWIG_DIR . '/Autoloader.php');
require_once(TRAITS_DIR . '/Singleton.php');
require_once(LIB_DIR . '/DataBase.php');
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);