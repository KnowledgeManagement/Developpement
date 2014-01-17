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
	$sql = run("SELECT idSousCat, nomSousCat, nomCat, m5f_categorie.idCat
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

function UpdateSousCategorie($intitule_sous_cat, $id){
	$sql = run("UPDATE m5f_sous_categorie
				SET nomSousCat = '".$intitule_sous_cat."'
				WHERE idSousCat = '".$id."';");
}

function getSousCategorieDinstinctCategorie(){
	$sql = run("SELECT DISTINCT(idCat)
				FROM m5f_sous_categorie");
	return $sql;
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

function getFunctionBySousCategorieTmp($id){
	$sql = run("SELECT intituleTmp, idReferenceTmp, dateTmp, descriptionTmp, exempleTmp, lienTelechargementTmp
				FROM m5f_tmp
				WHERE idReferenceTmp = '".$id."'");
	return $sql;
}

function deleteFiles($reference){
	$info = getFunctionBySousCategorie($reference);
	$directory = $_SERVER['DOCUMENT_ROOT'].'/ProjetKM/Defaults/'.$info[0]['lienTelechargement'];
	unlink($directory);
}

function findLink($reference){
	$info = getFunctionBySousCategorie($reference);
	$directory = $info[0]['lienTelechargement'];
	return $directory;
}

function findLinkTmp($reference){
	$info = getFunctionBySousCategorieTmp($reference);
	$directory = $info[0]['lienTelechargementTmp'];
	return $directory;
}

function deleteFunction($reference){
	deleteFiles($reference);
	$sql = run("DELETE from m5f_document WHERE idReference = '".$reference."'");
	//$_SERVER['DOCUMENT_ROOT'].'/ProjetKM/Defauts/dlExemples/Reseaux/AdressageIP/REEEE.txt';
}

function deleteFunctionBySousCategorie($idSousCat){
	deleteFiles($idSousCat);
	$sql = run("DELETE from m5f_document WHERE idSousCat = '".$idSousCat."'");
}

?>