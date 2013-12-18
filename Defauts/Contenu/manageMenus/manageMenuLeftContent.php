<?php
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	$lesCate = getAllCategorie();
	for($i = 0; $i < sizeof($lesCate); $i++){
		echo '<ul class="cat">'.$lesCate[$i]['nomCat'].'</ul><br/><br/><br/>'; 
		$SousMenu = getSousCategorieByCategorie($lesCate[$i]['idCat']);
		if(isset($SousMenu)){
			for($j = 0; $j < sizeof($SousMenu); $j++){
				echo '<li class="sous_cat">'.$SousMenu[$j]['nomSousCat'].'</li><br/>'; 
			}
		}
		echo '<br/>';
	}
?>