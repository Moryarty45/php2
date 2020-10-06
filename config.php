<?php

spl_autoload_register(function($classname){
	switch($classname[0])
	{
		case 'C':
			include_once("c/$classname.php");
			break;
		case 'M':
			include_once("m/$classname.php");
			break;
	}
});

define('BASE_URL', $_SERVER["HTTP_HOST"]);

define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '123456');
define('MYSQL_DB', 'php2');
