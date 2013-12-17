<?php
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	
	$lesCate = getAllCategorie();
	
	for($i = 0; $i < sizeof($lesCate); $i++){
?>

		<table class="menuTab">
			<tr>
				<td class="menuCat"><?php echo $lesCate[$i]['nomCat']; ?></td>
				<td class="menuButton"><input type="button" value="Modifier" class="bouton"></td>
				<td class="menuButton"><input type="button" value="Supprimer" class="bouton"></td>
			</tr>	
	<?php		
		$SousMenu = getSousCategorieByCategorie($lesCate[$i]['idCat']);
		
		if(isset($SousMenu)){
			for($j = 0; $j < sizeof($SousMenu); $j++){
			?>
				<tr>
					<td class="menuSousCat"><?php echo $SousMenu[$j]['nomSousCat']; ?></td>
					<td class="menuButton"><input type="button" value="Modifier" class="bouton"></td>
					<td class="menuButton"><input type="button" value="Supprimer" class="bouton"></td>
				</tr>
			<?php
			}
		}
	?>
		</table>
		
	<hr style="width:80%"/>
	<center><input type="button" value="Nouveau" id="menuButtonNew" class="bouton"></center>
	<hr style="width:80%"/>
<?php
	}
?>