<?php

abstract class C_Base extends C_Controller
{
	protected $title;
	protected $content;
	protected $needLogin;
	protected $user;

	function __construct()
	{	
		$this->needLogin = false;
		$this->user = M_Users::Instance()->Get();
	}
	
	protected function before()
	{
		if($this->needLogin && $this->user === null)
			$this->redirect('/auth/login');
	
		$this->title = 'Заголовок сайта';
		$this->content = '';
	}
	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content);	
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}	
}
