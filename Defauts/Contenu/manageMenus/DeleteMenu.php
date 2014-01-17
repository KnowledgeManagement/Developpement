<?php
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	$idCat = $_POST['idCat'];
	deleteCategorie($idCat);
?>