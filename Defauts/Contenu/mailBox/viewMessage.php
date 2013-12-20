<?php
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	$idMessage = $_POST['id'];
	$message = getMessageById($idMessage);
	setMessageRead($idMessage);
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
?>
<div style="margin-top : 50px;">
	<input type="button" class="bouton" value="Accepter"/>
	<input type="button" class="bouton" value="Modifier"/>
	<input type="button" class="bouton" value="Refuser"/>
</div>
