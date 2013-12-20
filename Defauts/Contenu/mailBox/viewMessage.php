<?php
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	$idMessage = $_POST['id'];
	$message = getMessageById($idMessage);
	
	echo $message[0]['contenu'];
?>