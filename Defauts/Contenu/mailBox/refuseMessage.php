<?php
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	$idMessage = $_POST['id'];
	$commentaires = $_POST['comm'];
	setMessageRefused($idMessage, $commentaires);
?>