<?php

class M_Users
{	
	private static $instance;
	private $msql;
	private $sid;
	private $uid;
	private $onlineMap;
	
	public static function Instance()
	{
		if (self::$instance == null)
			self::$instance = new M_Users();
			
		return self::$instance;
	}

	public function __construct()
	{
		$this->msql = M_MSQL::Instance();
		$this->sid = null;
		$this->uid = null;
		$this->onlineMap = null;
	}
	
	public function ClearSessions()
	{
		$min = date('Y-m-d H:i:s', time() - 60 * 20); 			
		$t = "time_last < '%s'";
		$where = sprintf($t, $min);
		$this->msql->Delete('sessions', $where);
	}

	public function Login($login, $password, $remember = true)
	{
		$user = $this->GetByLogin($login);

		if ($user == null)
			return false;
		
		$id_user = $user['id_user'];
				
		if ($user['password'] != md5($password))
			return false;
				
		if ($remember)
		{
			$expire = time() + 3600 * 24 * 100;
			setcookie('login', $login, $expire);
			setcookie('password', md5($password), $expire);
		}		
				
		$this->sid = $this->OpenSession($id_user);
		
		return true;
	}
	
	public function Logout()
	{
		setcookie('login', '', time() - 1);
		setcookie('password', '', time() - 1);
		unset($_COOKIE['login']);
		unset($_COOKIE['password']);
		unset($_SESSION['sid']);		
		$this->sid = null;
		$this->uid = null;
	}
						
	public function Get($id_user = null)
	{	
		if ($id_user == null)
			$id_user = $this->GetUid();
			
		if ($id_user == null)
			return null;
			
		$t = "SELECT * FROM users WHERE id_user = '%d'";
		$query = sprintf($t, $id_user);
		$result = $this->msql->Select($query);
		return $result[0];		
	}
	
	public function GetByLogin($login)
	{	
		$t = "SELECT * FROM users WHERE login = '%s'";
		$query = sprintf($t, mysql_real_escape_string($login));
		$result = $this->msql->Select($query);
		return $result[0];
	}
			
	public function Can($priv, $id_user = null)
	{		
		if ($id_user == null)
		    $id_user = $this->GetUid();
		    
		if ($id_user == null)
		    return false;
		    
		$t = "SELECT count(*) as cnt FROM privs2roles p2r
			  LEFT JOIN users u ON u.id_role = p2r.id_role
			  LEFT JOIN privs p ON p.id_priv = p2r.id_priv 
			  WHERE u.id_user = '%d' AND p.name = '%s'";
	
		$query  = sprintf($t, $id_user, $priv);
		$result = $this->msql->Select($query);
		
		return ($result[0]['cnt'] > 0);
	}

	public function IsOnline($id_user)
	{		
		if ($this->onlineMap == null)
		{	    
		    $t = "SELECT DISTINCT id_user FROM sessions";		
		    $query  = sprintf($t, $id_user);
		    $result = $this->msql->Select($query);
		    
		    foreach ($result as $item)
		    	$this->onlineMap[$item['id_user']] = true;		    
		}
		
		return ($this->onlineMap[$id_user] != null);
	}
	
	public function GetUid()
	{	

		if ($this->uid != null)
			return $this->uid;	

		$sid = $this->GetSid();
				
		if ($sid == null)
			return null;
			
		$t = "SELECT id_user FROM sessions WHERE sid = '%s'";
		$query = sprintf($t, mysql_real_escape_string($sid));
		$result = $this->msql->Select($query);
				
		if (count($result) == 0)
			return null;
			
		$this->uid = $result[0]['id_user'];
		return $this->uid;
	}

	private function GetSid()
	{
		if ($this->sid != null)
			return $this->sid;
	
		$sid = $_SESSION['sid'];
								
		if ($sid != null)
		{
			$session = array();
			$session['time_last'] = date('Y-m-d H:i:s'); 			
			$t = "sid = '%s'";
			$where = sprintf($t, mysql_real_escape_string($sid));
			$affected_rows = $this->msql->Update('sessions', $session, $where);

			if ($affected_rows == 0)
			{
				$t = "SELECT count(*) FROM sessions WHERE sid = '%s'";		
				$query = sprintf($t, mysql_real_escape_string($sid));
				$result = $this->msql->Select($query);
				
				if ($result[0]['count(*)'] == 0)
					$sid = null;			
			}			
		}		
		
		if ($sid == null && isset($_COOKIE['login']))
		{
			$user = $this->GetByLogin($_COOKIE['login']);
			
			if ($user != null && $user['password'] == $_COOKIE['password'])
				$sid = $this->OpenSession($user['id_user']);
		}
		
		if ($sid != null)
			$this->sid = $sid;
		return $sid;		
	}
	
	private function OpenSession($id_user)
	{
		$sid = $this->GenerateStr(10);
		$now = date('Y-m-d H:i:s'); 
		$session = array();
		$session['id_user'] = $id_user;
		$session['sid'] = $sid;
		$session['time_start'] = $now;
		$session['time_last'] = $now;				
		$this->msql->Insert('sessions', $session); 
				
		$_SESSION['sid'] = $sid;				
				
		return $sid;	
	}

	private function GenerateStr($length = 10) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
		$code = "";
		$clen = strlen($chars) - 1;  

		while (strlen($code) < $length) 
            $code .= $chars[mt_rand(0, $clen)];  

		return $code;
	}
}
