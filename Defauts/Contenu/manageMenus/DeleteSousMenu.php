<?php
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	$idSousCat = $_POST['idSousCat'];
	deleteSousCategorie($idSousCat);
	deleteFunctionBySousCategorie($idSousCat);
?>