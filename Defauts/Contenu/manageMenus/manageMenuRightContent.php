<?php
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	
	$lesCate = getAllCategorie();
	echo '<a href="#" style="float:right" id="menuButtonNew" class="boutonManage" onclick="javascript:goToManageMenusRightContentCreateMenu();">Nouveau</a>';
	for($i = 0; $i < sizeof($lesCate); $i++){
?>

		<table class="menuTab">
			<tr>
				<td class="menuCat"><?php echo $lesCate[$i]['nomCat']; ?></td>
				<td class="menuButton"><a href="#" class="boutonManage" onclick="javascript:goToManageMenusRightContentEditMenu();">Modifier</a></td>
				<td class="menuButton"><a href="#" class="boutonManage">Supprimer</a></td>
			</tr>	
	<?php		
		$SousMenu = getSousCategorieByCategorie($lesCate[$i]['idCat']);
		
		if(isset($SousMenu)){
			for($j = 0; $j < sizeof($SousMenu); $j++){
			?>
				<tr>
					<td class="menuSousCat"><?php echo $SousMenu[$j]['nomSousCat']; ?></td>
					<td class="menuButton"><a href="#" class="boutonManage" onclick="javascript:goToManageMenusRightContentEditSousMenu();">Modifier</a></td>
					<td class="menuButton"><a href="#" class="boutonManage">Supprimer</a></td>
				</tr>
			<?php
			}
		}
	?>
		</table>
		
	<hr style="width:40%;border:solid 1px #06131f"/>
	<center><span class="vide"><a href="#" id="menuButtonNew" class="boutonManage" onclick="javascript:goToManageMenusRightContentAddSousMenu();">Ajouter</a></span></center>
	<hr style="width:40%;border:solid 1px #06131f"/>
<?php
	}
?>