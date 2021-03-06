﻿<?php
	session_start();
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/user.php";
	$idMessage = $_POST['id'];
	$myMessage = getMessageById($idMessage);
?>
<div class="list-group">
	<div class="list-group-item">
		<form method="POST" id="formulaire" name="formulaire" enctype="multipart/form-data" action="Defauts\Contenu\mailBox\modifyMail.php">
			<input type="hidden" name="id" value='<?php echo $idMessage; ?>'/>
			<table class="table table-condensed" style="width : 100%;">

				<tr>
					<td class="tdModifFunction">Catégorie : </td>
					<td>
						<select name="categorie" class="form-control" id="categorie" onChange="javascript:showSousCategorie('<?php echo $idMessage ?>', this.options[this.selectedIndex].value)">
							<?php
								$cate = getAllCategorie();
								for($i = 0; $i < sizeof($cate); $i++){
									if(isset($_POST['idCategorie'])){
										if($_POST['idCategorie'] == $cate[$i]['idCat']){
											echo "<option class='option' selected='selected' value='".$cate[$i]['idCat']."'>".$cate[$i]['nomCat']."</option>";
										}else{
											echo "<option class='option' value='".$cate[$i]['idCat']."'>".$cate[$i]['nomCat']."</option>";
										}
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
						<select class="form-control" name="sousCategorie" id="sousCategorie">
							<?php
								$sousCate = getSousCategorieByCategorie($idCat);
								for($i = 0; $i < sizeof($sousCate); $i++){
									if($myMessage[0]['nomSousCat'] == $sousCate[$i]['nomSousCat']){
										echo "<option class='form-control' selected='selected' value='".$sousCate[$i]['idSousCat']."'>".$sousCate[$i]['nomSousCat']."</option>";
									}else{
										echo "<option class='form-control' value='".$sousCate[$i]['idSousCat']."'>".$sousCate[$i]['nomSousCat']."</option>";
									}				
								}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td class="tdModifFunction">Description :</td>
					<td><textarea name="description" style="min-height:130px;resize:vertical;" class="form-control"><?php echo $myMessage[0]['descriptionTmp']; ?></textarea></td>
				</tr>

				<tr>
					
					<td class="tdModifFunction">Exemple :</td>
					<td>
						<?php
							$exemple = $myMessage[0]['exempleTmp']; 
							$explodeSection = explode('<section', $exemple);
							$exp = 0;
							$ex = 0;
							$explodeExpli = explode('cadreMessage">', $explodeSection[0]);
							$explodeFinalExpli = explode('</div>', $explodeExpli[1]);
							echo '<textarea style="min-height:130px;resize:vertical;" id="explication'.$exp.'" class="form-control" name="explication'.$exp.'" required>'.$explodeFinalExpli[0].'</textarea>';
							$exp++;
						?>

						<?php
							if(isset($explodeSection[1])){
								for($i = 1; $i < sizeof($explodeSection); $i++){
									$explodeDiv = explode('<div', $explodeSection[$i]);
									$explodeCode = explode('<code>', $explodeDiv[0]);
									$codeFinal = explode('</code>', $explodeCode[1]);
									echo '</br><span class="alert alert-danger pull-left"><i class="glyphicon glyphicon-exclamation-sign"></i> Champ exclusivement réservé au code.</span></br><textarea id="exemple'.$ex.'" class="form-control" name="exemple'.$ex.'" required>'.$codeFinal[0].'</textarea>';
									$ex++;
									if(isset($explodeDiv[1])){
										if($i != sizeof($explodeSection)-1){
											$explodeExpli = explode('cadreMessage">', $explodeDiv[1]);
											$explodeFinalExpli = explode('</div>', $explodeExpli[1]);
											echo '<textarea style="min-height:130px;resize:vertical;" id="explication'.$exp.'" class="form-control" name="explication'.$exp.'" required>'.$explodeFinalExpli[0].'</textarea>';
											$exp++;
										}
									}
								}
							}
						?>
					</td>
				</tr>

				<tr>
					<?php
						$link = $myMessage[0]["lienTelechargementTmp"];
						$uploaddir = $_SERVER['DOCUMENT_ROOT'].'\Defauts\dlExemples\\'.$link;
					?>
					
					<td class="tdModifFunction">Pièce jointe : </td>
					<td><input type="file" style="width:160px;" name="pj" id="piecejointe" value="<?php echo $uploaddir; ?>"/><label> <?php echo $link; ?> </label></td>
				</tr>

				<tr>
					<td><input type="hidden" name="link" value="<?php echo $link; ?>"/></td>
					<td style="text-align : right;"><input type='submit' class='btn btn-sm btn-success' value='Valider la modification'/></td>
				</tr>

			</table>
			<input type="hidden" name="intituleTmp" value="<?php echo $myMessage[0]['intituleTmp']; ?>"/>
			<input type="hidden" name="nombre" value="<?php echo $exp-1; ?>"/>
		</form>
	</div>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
		Prism.highlightAll();
	});
</script>