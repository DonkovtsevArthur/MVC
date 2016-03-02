<?php 
	
	class Db
	{
		public static function getDb(){
			include_once ROOT. '/components/bd_parametrs.php';
			$db = mysqli_connect($localhost,$user,$password ,$dbname);
			mysqli_set_charset($db, "utf8");
			return $db;
		}
	}