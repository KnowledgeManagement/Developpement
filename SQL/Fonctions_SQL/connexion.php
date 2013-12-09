<?php

/* Fonction de connexion à la base de données */

	function run($sql)
	{
		//$serveur = "PC-THOMAS_PORT"; --> PHYSIQUE 
		$serveur = "109.14.88.25"; //---> Adresse IP publique de Thomas
		$user="Administrateur";
		$password="admin";
		$BDD="m5f";

		$serverName = $serveur; //serverName\instanceName
		$connectionInfo = array( "Database"=>$BDD, "UID"=>$user, "PWD"=>$password);
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		if($conn)
		{
		     // echo "Connection established.<br />";
		}
		else
		{
		     // echo "Connection could not be established.<br />";
		     die( print_r( sqlsrv_errors(), true));
		}
		
		$req = sqlsrv_query($conn, $sql);
		$array = null;
		while ($row = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC))
		{
			$array[] = $row;
		}
		return $array;
	}

?>