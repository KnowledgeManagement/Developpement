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
					$idCat = $myMessage[0]['idCat'];
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
		<td><textarea class="textarea"><?php echo $myMessage[0]['descriptionTmp']; ?></textarea></td>
	</tr>
	<tr>
		<td colspan='2'>
			<br/>
			<hr>
			<br/>
			<br/>
			<?php
				$exemple = $myMessage[0]['exempleTmp']; 
				$explodeSection = explode('<section', $exemple);
				$exp = 0;
				$ex = 0;
				$explodeExpli = explode('cadreMessage">', $explodeSection[0]);
				$explodeFinalExpli = explode('</div>', $explodeExpli[1]);
				echo '<textarea id="explication'.$exp.'" class="textarea" name="explication'.$exp.'" required>'.$explodeFinalExpli[0].'</textarea>';
				$exp++;
			?>
		</td>
	</tr>
		<?php
			if(isset($explodeSection[1])){
				for($i = 1; $i < sizeof($explodeSection); $i++){
					$explodeDiv = explode('<div', $explodeSection[$i]);
					$explodeCode = explode('<code>', $explodeDiv[0]);
					$codeFinal = explode('</code>', $explodeCode[1]);
					echo '<tr><td colspan="2"><span style="color:red">Attention : champ exclusivement réservé au code.</span></br><textarea id="exemple'.$ex.'" class="textarea" name="exemple'.$ex.'" required>'.$codeFinal[0].'</textarea></td></tr>';
					$ex++;
					if(isset($explodeDiv[1])){
						if($i != sizeof($explodeSection)-1){
							$explodeExpli = explode('cadreMessage">', $explodeDiv[1]);
							$explodeFinalExpli = explode('</div>', $explodeExpli[1]);
							echo '<tr><td colspan="2"><textarea id="explication'.$exp.'" class="textarea" name="explication'.$exp.'" required>'.$explodeFinalExpli[0].'</textarea></td></tr>';
							$exp++;
						}
					}
				}
			}
		?>
	<tr>
		<td class="tdModifFunction">Pièce jointe : </td>
		<!--<td><input type="button" class="bouton" value="Télécharger" onclick="javascript:downloadFunction('<?php //echo getLink($idMessage); ?>')"/> </td>-->
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="text-align : right;"><input type='button' style="width : 200px;" class='bouton' value='Valider la modification' onclick='javascript:validModif()'/></td>
	</tr>
</table>
<script type="text/javascript">
 $( document ).ready(function() {
  Prism.highlightAll();
 });
</script>