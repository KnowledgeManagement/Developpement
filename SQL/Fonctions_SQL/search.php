<?php
	include_once("connexion.php");

	function findTextByWord($word){
		$s1 = run("SELECT intituleDoc, description from m5f_document where (intituleDoc LIKE '%".$word."%' OR description LIKE '%".$word."%')");
		return $s1;
	}
	
	function findAllIntitule(){
		$s1 = run("SELECT intituleDoc from m5f_document");
		
		return $s1;
	}
?>