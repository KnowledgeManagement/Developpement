<?php
	session_start();
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/user.php";
	
	$idCategorie = $_POST['idCategorie'];
	if(isset($_POST['idSousCategorie'])){
		$idSousCategorie = $_POST['idSousCategorie'];
	}
?>
<table style="width : 100%;">
	<tr>
		<td class="tdModifFunction">Catégorie : </td>
		<td>
			<select name="categorie" class="option" id="categorie" onChange="javascript:showSousCategorieAddFunction(this.options[this.selectedIndex].value)">
				<?php
					$cate = getAllCategorie();
					for($i = 0; $i < sizeof($cate); $i++)
					{
						if($idCategorie == $cate[$i]['idCat']){
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
			<select name="categorie" class="option" id="sousCategorie">
				<?php
					$sousCate = getSousCategorieByCategorie($idCategorie);
					for($i = 0; $i < sizeof($sousCate); $i++)
					{
						if(isset($_POST['idSousCategorie']) && $idSousCategorie == $sousCate[$i]['idSousCat']){
							echo "<option class='option' selected='selected' value='".$sousCate[$i]['idSousCat']."'>".$sousCate[$i]['nomSousCat']."</option>";
						}else if(!isset($_POST['idSousCategorie'])){
							echo "<option class='option' value='".$sousCate[$i]['idSousCat']."'>".$sousCate[$i]['nomSousCat']."</option>";
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
		<td><textarea class="textarea"></textarea></td>
	</tr>
	<tr>
		<td class="tdModifFunction">Pièce jointe : </td>
		<td><input type="button" class="bouton" value="Insérer"/> </td>
	</tr>
</table>