<?php
class M_MSQL
{
	private static $instance;

	public static function Instance()
	{
		if (self::$instance == null)
			self::$instance = new M_MSQL();
			
		return self::$instance;
	}

	private function __construct()
	{	
		mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD) or die('No connect with data base'); 
	}
	
	public function Select($query)
	{
		$result = mysqli_query($query);
		
		if (!$result)
			die(mysqli_error());
		
		$n = mysqli_num_rows($result);
		$arr = array();
	
		for($i = 0; $i < $n; $i++)
		{
			$row = mysqli_fetch_assoc($result);		
			$arr[] = $row;
		}

		return $arr;				
	}
	
	public function Insert($table, $object)
	{			
		$columns = array();
		$values = array();
	
		foreach ($object as $key => $value)
		{
			$key = mysqli_real_escape_string($key . '');
			$columns[] = $key;
			
			if ($value === null)
			{
				$values[] = 'NULL';
			}
			else
			{
				$value = mysqli_real_escape_string($value . '');							
				$values[] = "'$value'";
			}
		}
		
		$columns_s = implode(',', $columns);
		$values_s = implode(',', $values);
			
		$query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
		$result = mysqli_query($query);
								
		if (!$result)
			die(mysqli_error());
			
		return mysqli_insert_id();
	}
		
	public function Update($table, $object, $where)
	{
		$sets = array();
	
		foreach ($object as $key => $value)
		{
			$key = mysqli_real_escape_string($key . '');
			
			if ($value === null)
			{
				$sets[] = "$key=NULL";			
			}
			else
			{
				$value = mysqli_real_escape_string($value . '');					
				$sets[] = "$key='$value'";			
			}			
		}
		
		$sets_s = implode(',', $sets);			
		$query = "UPDATE $table SET $sets_s WHERE $where";
		$result = mysqli_query($query);
		
		if (!$result)
			die(mysqli_error());

		return mysqli_affected_rows();	
	}
		
	public function Delete($table, $where)
	{
		$query = "DELETE FROM $table WHERE $where";		
		$result = mysqli_query($query);
						
		if (!$result)
			die(mysqli_error());

		return mysqli_affected_rows();	
	}
}
