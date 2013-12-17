<?php
	
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	
	$lesCate = getAllCategorie();
	
	for($i = 0; $i < sizeof($lesCate); $i++){
		echo '<table class="menu_tab">';
		echo '<tr>';
		echo '<td class="menu_cat">'.$lesCate[$i]['nomCat'].'</td>'; 
		echo '<td class="menu_button"><input type="button" value="Modifier" class="bouton"></td>';
		echo '<td class="menu_button"><input type="button" value="Supprimer" class="bouton"></td>';
		echo '</tr>';
		
		$SousMenu = getSousCategorieByCategorie($lesCate[$i]['idCat']);
		
			if(isset($SousMenu)){
				for($j = 0; $j < sizeof($SousMenu); $j++){
					echo '<tr>';
					echo '<td class="menu_sous_cat">'.$SousMenu[$j]['nomSousCat'].'</td>';
					echo '<td class="menu_button"><input type="button" value="Modifier" class="bouton"></td>';
					echo '<td class="menu_button"><input type="button" value="Supprimer" class="bouton"></td>';
					echo '</tr>';
				}
			}
			
		echo '</table>';
		echo '<hr style="width:80%"/>';
		echo '<center><input type="button" value="Nouveau" id="menu_button_new" class="bouton"></center>';
		echo '<hr style="width:80%"/>';
	}
?>