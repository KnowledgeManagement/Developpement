<?php
	include_once("connexion.php");

	function findIntituleByWord($word){
		$s1 = run("SELECT intituleDoc from m5f_document where intituleDoc LIKE '%".$word."%'");
		
		return $s1;
	}
	
	function findAllIntitule(){
		$s1 = run("SELECT intituleDoc from m5f_document");
		
		return $s1;
	}
?>