<?php
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	
	$sousCa = $_POST['sousCate'];
	$cat = getSousCategorieById($sousCa);
	$array = array();
	$array['nomCat'] = $cat[0]['nomCat'];
	$array['nomSousCat'] = $cat[0]['nomSousCat'];
	print json_encode($array);
?>