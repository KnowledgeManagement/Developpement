<?php

include_once "../../../SQL/Fonctions_SQL/categorie.php";
include_once "../../../SQL/Fonctions_SQL/souscategorie.php";

$nomSousCat = $_POST['nomSousCat'];
$idCat = $_POST['idCat'];

if($nomSousCat != ""){
	addSousCategorie($nomSousCat, $idCat);
}

?>