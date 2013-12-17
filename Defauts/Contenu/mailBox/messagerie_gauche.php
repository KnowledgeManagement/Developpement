<?php

	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
									
	$allRead = countMessAllRead();
	$notRead = countMessNotRead();
	$Read = countMessRead();
	echo "(<b>".$allRead."</b>) Tous les messages<br/>";
	echo "(<b>".$Read."</b>) Message(s) lu(s)<br/>";
	echo "(<b>".$notRead."</b>) Message(s) non lu(s)";
																
?>