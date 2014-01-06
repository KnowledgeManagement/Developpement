<?php
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	$idMessage = $_POST['id'];
	$message = getMessageById($idMessage);
	if($message[0]['etat'] == 'Non Lu'){
		setMessageRead($idMessage);
	}
?>
<table>
	<tr>
		<td>
			Expéditeur :
		</td>
		<td>
			<?php echo $message[0]['nom'].' '.$message[0]['prenom']; ?>
		</td>
	</tr>
	<tr>
		<td>
			Date :
		</td>
		<td>
			<?php echo $message[0]['date']->format('d/m/Y H:i:s'); ?>
		</td>
	</tr>
	<tr>
		<td>
			Catégorie :
		</td>
		<td>
			<?php echo $message[0]['nomCat']; ?>
		</td>
	</tr>
	<tr>
		<td>
			Sous-catégorie :
		</td>
		<td>
			<?php echo $message[0]['nomSousCat']; ?>
		</td>
	</tr>
</table>
<?php
	echo "<br />";
	echo "Contenu :<br /><br/>";
	echo $message[0]['contenu'];
	if($message[0]['etat'] == 'Non Lu' || $message[0]['etat'] == 'Lu'){
?>
	<div style="margin-top : 50px;">
		Commentaire : <input type="text" class="label" style="width : 350px;" id="commentaire" placeholder="Le commentaire sera vu par le contributeur..."/><br/><br/>
		<input type="button" class="bouton" value="Accepter" onclick="javascript:validMessage(<?php echo $idMessage; ?>)"/>
		<input type="button" class="bouton" value="Modifier" onclick="javascript:modifMessage(<?php echo $idMessage; ?>)"/>
		<input type="button" class="bouton" value="Refuser" onclick="javascript:refuseMessage(<?php echo $idMessage; ?>)"/>
	</div>
<?php
	}
?>
