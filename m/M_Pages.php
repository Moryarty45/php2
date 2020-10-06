<?php

class M_Pages
{
	private static $instance;

	public static function Instance()
	{
		if (self::$instance == null)
			self::$instance = new M_Pages();
			
		return self::$instance;
	}
	
	public function text_get($id)
	{
		return file_get_contents("data/$id.txt");
	}

	public function text_set($text, $id)
	{
		file_put_contents("data/$id.txt", $text);
	}
}