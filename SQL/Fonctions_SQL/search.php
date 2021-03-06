<?php
	include_once("connexion.php");

	function findTextByWord($word){
		$s1 = run("SELECT top 10 idReference, intituleDoc, description, idSousCat from m5f_document where (upper(intituleDoc) LIKE upper('%".$word."%') OR description LIKE '%".$word."%')");
		return $s1;
	}
	
	function findTextByWordFilter($word, $myArray){
		$liste = array();
		for($i = 0; $i < sizeof($myArray); $i++){
			$s1 = run("SELECT top 10 idReference, intituleDoc, description, idSousCat from m5f_document where idSousCat=".$myArray[$i]." AND (upper(intituleDoc) LIKE upper('%".$word."%') OR description LIKE '%".$word."%')");
			for($j = 0; $j < sizeof($s1); $j++){
				$liste[] = $s1[$j];
			}
		}
		return $liste;
	}
	
	function findAllIntitule(){
		$s1 = run("SELECT intituleDoc from m5f_document");
		
		return $s1;
	}
	
	function findInfosCat($idReference){
		$s1 = run("select nomSousCat, nomCat from m5f_categorie, m5f_sous_categorie, m5f_document where m5f_categorie.idCat = m5f_sous_categorie.idCat and m5f_sous_categorie.idSousCat = m5f_document.idSousCat and m5f_document.idReference='".$idReference."'");
		return $s1;
	}
?>