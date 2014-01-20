<?php
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	$idMessage = $_POST['id'];
	if($_POST['type'] == 'mess'){
		$message = getMessageById($idMessage);
		if($message[0]['etatTmp'] == 'Non Lu'){
			setMessageRead($idMessage);
		}
	}else{
		$message = getMessageByIdContact($idMessage);
		if($message[0]['lu'] == '0'){
			setMessageReadContact($idMessage);
		}
	}
?>
<table>
	<tr>
		<td>
			<b>Expéditeur :</b>
		</td>
		<td>
			<?php echo $message[0]['nom'].' '.$message[0]['prenom']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<b>Date :</b>
		</td>
		<td>
			<?php 
				if($_POST['type'] == 'mess'){
					echo $message[0]['dateTmp']->format('d/m/Y');
				}else{
					echo $message[0]['date']->format('d/m/Y H:i:s');
				}
			?>
		</td>
	</tr>
	<?php
		if($_POST['type'] == 'mess'){
	?>
		<tr>
			<td>
				<b>Catégorie :</b>
			</td>
			<td>
				<?php echo $message[0]['nomCat']; ?>
			</td>
		</tr>
		<tr>
			<td>
				<b>Sous-catégorie :</b>
			</td>
			<td>
				<?php echo $message[0]['nomSousCat']; ?>
			</td>
		</tr>
	<?php
		}
	?>
</table>
<?php
	echo "<br />";
	echo "<b>Contenu :</b><br /><br/>";
	if($_POST['type'] == 'mess'){
		echo '<b>Description : </b><br/><br/>'.$message[0]['descriptionTmp'].'<br/></br>';
		echo '<b>Exemple : </b><br/><br/><section class="language-php"><pre class="line-numbers" style="solid cadetblue 4px;"><code>'.htmlspecialchars($message[0]['exempleTmp']).'</code></pre></section>';


		if($message[0]['etatTmp'] == 'Non Lu' || $message[0]['etatTmp'] == 'Lu'){
	?>
		<div style="margin-top : 50px;">
			<b>Commentaire :</b> <input type="text" class="label" style="width : 350px;" id="commentaire" placeholder="Le commentaire sera vu par le contributeur..."/><br/><br/>
			<input type="button" class="bouton" value="Accepter" onclick="javascript:validMessage('<?php echo $idMessage; ?>')"/>
			<input type="button" class="bouton" value="Modifier" onclick="javascript:modifMessage('<?php echo $idMessage; ?>', '<?php echo $message[0]['intituleTmp']; ?>')"/>
			<input type="button" class="bouton" value="Refuser" onclick="javascript:refuseMessage('<?php echo $idMessage; ?>')"/>
		</div>
	<?php
		}
	}else{
		echo $message[0]['contenu'];
	}
?>
<script type="text/javascript">
 $( document ).ready(function() {
  Prism.highlightAll();
 });
</script>