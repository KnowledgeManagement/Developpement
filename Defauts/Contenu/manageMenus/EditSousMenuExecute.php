<?php

include_once "../../../SQL/Fonctions_SQL/categorie.php";
include_once "../../../SQL/Fonctions_SQL/souscategorie.php";

$nomSousCat = $_POST['nomSousCat'];
$idSousCat = $_POST['idSousCat'];

if($nomSousCat != ""){
	UpdateSousCategorie($nomSousCat, $idSousCat);
}

?>