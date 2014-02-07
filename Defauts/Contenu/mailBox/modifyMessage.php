<?php
	session_start();
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/user.php";
	$idMessage = $_POST['id'];
	$myMessage = getMessageById($idMessage);
?>
<table style="width : 100%;">
	<tr>
		<td class="tdModifFunction">Catégorie : </td>
		<td>
			<select name="categorie" class="option" id="categorie" onChange="javascript:showSousCategorie('<?php echo $idMessage ?>', this.options[this.selectedIndex].value)">
				<?php
					$cate = getAllCategorie();
					for($i = 0; $i < sizeof($cate); $i++){
						if(isset($_POST['idCategorie']) && $_POST['idCategorie'] == $cate[$i]['idCat']){
							echo "<option class='option' selected='selected' value='".$cate[$i]['idCat']."'>".$cate[$i]['nomCat']."</option>";
						}else if($myMessage[0]['nomCat'] == $cate[$i]['nomCat']){
							echo "<option class='option' selected='selected' value='".$cate[$i]['idCat']."'>".$cate[$i]['nomCat']."</option>";
						}else{
							echo "<option class='option' value='".$cate[$i]['idCat']."'>".$cate[$i]['nomCat']."</option>";
						}				
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td class="tdModifFunction">Sous Catégorie : </td>
		<td>
			<?php
				if(isset($_POST['idCategorie'])){
					$idCat = $_POST['idCategorie'];
				}else{
					$idCat = 1;
				}
			?>
			<select name="categorie" class="option" id="sousCategorie">
				<?php
					$sousCate = getSousCategorieByCategorie($idCat);
					for($i = 0; $i < sizeof($sousCate); $i++){
						if($myMessage[0]['nomSousCat'] == $sousCate[$i]['nomSousCat']){
							echo "<option class='option' selected='selected' value='".$sousCate[$i]['idSousCat']."'>".$sousCate[$i]['nomSousCat']."</option>";
						}else{
							echo "<option class='option' value='".$sousCate[$i]['idSousCat']."'>".$sousCate[$i]['nomSousCat']."</option>";
						}				
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td class="tdModifFunction">Description :</td>
		<td><textarea class="textarea"></textarea></td>
	</tr>
	<tr>
		<td class="tdModifFunction">Exemple : </td>
		<?php //$taVariable = htmlentities(addslashes(nl2br($taVariable))); ?>
		<td><textarea class="textarea"></textarea></td>
	</tr>
	<tr>
		<td class="tdModifFunction">Pièce jointe : </td>
		<td><input type="button" class="bouton" value="Télécharger" onclick="javascript:downloadFunction('<?php echo getLink($idMessage); ?>')"/> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="text-align : right;"><input type='button' class='bouton' value='Valider la modification' onclick='javascript:validModif()'/></td>
	</tr>
</table>