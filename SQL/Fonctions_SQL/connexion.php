<?php

/* Fonction de connexion à la base de données */

	function run($sql)
	{
		$serveur = "M5F";
		$user = "Administrateur";
		$password = "Administrateur";
		$BDD="m5f";

		$serverName = $serveur; //serverName\instanceName
		$connectionInfo = array( "Database"=>$BDD, "UID"=>$user, "PWD"=>$password);
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		if(!$conn){
		    die( print_r( sqlsrv_errors(), true));
		}
		
		$req = sqlsrv_query($conn, $sql);
		$array = null;
		while ($row = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC))
		{
			$ra = array();
			foreach ($row as $k=> $v) 
			{	
				if($v instanceof DateTime){ 
					/*$v = $v->getTimestamp(); 
					$date = new DateTime(); 
					$date->setTimestamp($v); 
					$v = $date;*/
					
				} 
				else{ 
					$v = mb_detect_encoding($v, mb_detect_order(), true) === 'UTF-8' ? $v : mb_convert_encoding($v, 'UTF-8');
				} 
				$ra[$k] = $v;
			}
			$array[] = $ra;
		}
		return $array;
	}

?>