<?php

abstract class C_Controller
{
	protected $params;

	protected abstract function render();
	
	protected abstract function before();
	
	public function Request($action, $params)
	{
		$this->params = $params;
		$this->before();
		$this->$action();
		$this->render();
	}
	
	protected function IsGet()
	{
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	protected function IsPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}

	protected function Template($fileName, $vars = array())
	{
		foreach ($vars as $k => $v)
		{
			$$k = $v;
		}

		ob_start();
		include "$fileName";
		return ob_get_clean();	
	}	
	
	public function __call($name, $params){
        die('Нет такого url');
	}
	
	protected function redirect($url){
	
		if($url[0] == '/')
			$url = BASE_URL . substr($url, 1);

		header("location: $url");
		exit();
	}
}
