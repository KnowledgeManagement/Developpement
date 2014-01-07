<?php
include_once("connexion.php");

/* Selectionne les données des sous-catégories */
function getAllSousCategorie(){
	$sql = run("SELECT idSousCat, nomSousCat, idCat
				FROM m5f_sous_categorie;");
	return $sql;
}

/* Selectionne les données d'une sous-catégorie pour une catégorie précise dont on précisera l'identifiant en paramètre */
function getSousCategorieByCategorie($id){
	$sql = run("SELECT idSousCat, nomSousCat, idCat 
				FROM m5f_sous_categorie 
				WHERE idCat = '".$id."'
				ORDER BY nomSousCat");
	return $sql;
}

/* Selectionne les données d'une sous-catégorie dont on précisera son identifiant en paramètre */
function getSousCategorieById($id){
	$sql = run("SELECT idSousCat, nomSousCat, nomCat
				FROM m5f_sous_categorie, m5f_categorie
				where m5f_categorie.idCat = m5f_sous_categorie.idCat
				and idSousCat = ".$id);
	return $sql;
}

/* Ajoute une sous-catégorie. On précisera les valeurs "intitulé" et l'"identifiant" de la catégorie pour laquelle la sous-catégorie est rattachée */
function addSousCategorie($intitule_sous_cat,$id_cat){
	$sql = run("INSERT INTO m5f_sous_categorie(nomSousCat, idCat) 
				VALUE('".$intitule_sous_cat."','".$id_cat."')");
}

/* Supprime une sous-catégorie avec en paramètre son identifiant */
function deleteSousCategorie($id){
	$sql = run("DELETE FROM m5f_sous_categorie
				WHERE idSousCat = '".$id."';");
}

function getFunctionNameBySousCategorie($id){
	$sql = run("SELECT intituleDoc, idReference 
				FROM m5f_document
				WHERE idSousCat = ".$id."
				ORDER by intituleDoc");
	return $sql;
}

function getFunctionBySousCategorie($id){
	$sql = run("SELECT intituleDoc, idReference, date, description, exemple, lienTelechargement
				FROM m5f_document
				WHERE idReference = '".$id."'");
	return $sql;
}



?>