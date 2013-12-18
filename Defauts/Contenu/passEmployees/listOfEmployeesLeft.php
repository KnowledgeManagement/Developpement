<?php
	include_once "../../../SQL/Fonctions_SQL/user.php";

		$listOfUsers = getAllUser();
		for($j = 0; $j < sizeof($listOfUsers); $j++){
			echo '<span style="float:left;">'.$listOfUsers[$j]['nom'].' '.$listOfUsers[$j]['prenom'].'</span><br/>'; 
		}
?>