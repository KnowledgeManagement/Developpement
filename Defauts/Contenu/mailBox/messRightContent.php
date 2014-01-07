<?php
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	/*******************************************************************************/
	
	/* Ne pas oublier d'intégrer la table m5f_contact dans la gestion des messages !!
	
	/*******************************************************************************/
?>
	<h3>Ajout/Modification de fonctions</h3>
	<table id='messArray'>
<?php
	switch($_POST['etat']){
		case 'allMessages':
			$messages = getAllMess();
			break;
		case 'read':
			$messages = getMessRead();
			break;
		case 'notRead':
			$messages = getMessNotRead();
			break;
	}
	for($i=0;$i<sizeof($messages);$i++){
		if($messages[$i]['etatTmp'] == "Non lu" || $messages[$i]['etatTmp'] == 'Non Lu'){ 
			echo "<tr style='background-color:#11283e;'>";
		}else{
			echo "<tr>";
		}
?>
			<td id='messCheckbox'>
				<input type='checkbox' <?php echo 'id="check'.$i.'"' ?> value=''>
			</td>
			<td id='messName'>
				<label for="<?php echo "check".$i; ?>">
					<?php echo $messages[$i]['nom'].' '.$messages[$i]['prenom']; ?>
				</label>
			</td>
			<td id='messTitle'>
				<label for="<?php echo "check".$i; ?>">
					<a href='#' onclick="javacript:openMessage('<?php echo $messages[$i]['idReferenceTmp'] ?>', '<?php echo $messages[$i]['intituleTmp']; ?>')">
						<?php echo $messages[$i]['intituleTmp']; ?>
					</a>
				</label>
			</td>
			<td class='messTime'>
				<label for="<?php echo "check".$i; ?>">
					<?php
						if($messages[$i]['etatTmp'] == "Refusé"){
							echo "<span title='".addslashes($messages[$i]['commentaireTmp'])."'>".urldecode($messages[$i]['etatTmp'])."</span>";
						}else{
							echo urldecode($messages[$i]['etatTmp']);
						}
					?>
				</label>
			</td>
			<td class='messTime'>
				<label for="<?php echo "check".$i; ?>">
					<?php echo $messages[$i]['dateTmp']->format('d/m/Y H:i:s'); ?>
				</label>
			</td>
		</tr>
<?php
	}
?>
	</table>
	
	<h3>Autres messages</h3>
	<table id='messArray'>
<?php
	switch($_POST['etat']){
		case 'allMessages':
			$messages = getAllMessContact();
			break;
		case 'read':
			$messages = getMessReadContact();
			break;
		case 'notRead':
			$messages = getMessNotReadContact();
			break;
	}
	for($i=0;$i<sizeof($messages);$i++){
		if($messages[$i]['lu'] == 0){
			echo "<tr style='background-color:#11283e;'>";
		}else{
			echo "<tr>";
		}
?>
			<td id='messCheckbox'>
				<input type='checkbox' <?php echo 'id="check'.$i.'"' ?> value=''>
			</td>
			<td id='messName'>
				<label for="<?php echo "check".$i; ?>">
					<?php echo $messages[$i]['nom'].' '.$messages[$i]['prenom']; ?>
				</label>
			</td>
			<td id='messTitle'>
				<label for="<?php echo "check".$i; ?>">
					<a href='#' onclick="javacript:openMessageContact(<?php echo $messages[$i]['idFormContact'] ?>, '<?php echo $messages[$i]['objet']; ?>')">
						<?php echo $messages[$i]['objet']; ?>
					</a>
				</label>
			</td>
			<td class='messTime'>
				<label for="<?php echo "check".$i; ?>">
					<?php
						if($messages[$i]['lu'] == 0){
							echo "Non Lu";
						}else{
							echo "Lu";
						}
					?>
				</label>
			</td>
			<td class='messTime'>
				<label for="<?php echo "check".$i; ?>">
					<?php echo $messages[$i]['date']->format('d/m/Y H:i:s'); ?>
				</label>
			</td>
		</tr>
<?php
	}
?>
	</table>
	<input type='submit' class='bouton' id='messDelete' name='messButton' value='Supprimer' />