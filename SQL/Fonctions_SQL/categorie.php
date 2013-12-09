<?php
include_once("connexion.php");

/* Fonction qui retourne l'identifiant et l'intitulé des catégories */
function getAllCategorie(){
	$sql = run("SELECT idCat, nomCat
				FROM m5f_categorie
				ORDER BY idCat");
	return $sql;
}

/* Fonction qui retourne l'identifiant et l'intitulé d'une catégorie dont on précise l'identifiant */
function getCategorieById($id){
	$sql = run("SELECT idCat, nomCat 
				FROM m5f_categorie 
				WHERE idCat = '".$id."';");
	return $sql;
}

/* Fonction qui ajoute une catégorie dont on saisira l'intitulé */
function addCategorie($intitule_cat){
	$sql = run("INSERT INTO m5f_categorie(nomCat) 
				VALUE('".$intitule_cat."')");
}

/* Fonction qui supprime une catégorie dont on précisera l'identifiant */
function deleteCategorie($id){
	$sql = run("DELETE FROM m5f_categorie 
				WHERE idCat = '".$id."';");
}

?>