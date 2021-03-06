﻿<?php
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";

?>
<div id="info"></div>
	<div class="form-inline">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4><i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;Ajout/Modification de fonctions</h4>
	

	<table class="table table-condensed" id="messArray">
		<tr class="titre">
			<th style="width:5%">&nbsp;</th>
			<th style="width:40%">De...</th>
			<th style="width:15%">Objet</th>
			<th style="width:15%">Etat</th>
			<th style="width:25%">Date</th>
		</tr>
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
			echo "<tr class='active'>";
		}else if($messages[$i]['etatTmp'] == "Refusé"){
				echo "<tr class='danger'>";
		}else{
				echo "<tr>";
		}
?>
			<td id='messCheckbox'>
				<input type='checkbox'  name='boxMess[]' <?php echo 'value="check'.$messages[$i]['idReferenceTmp'].'"' ?> value=''>
				<label class="checkbox_label"></label>
			</td>
			<td class='cursor' onclick="javacript:openMessage('<?php echo $messages[$i]['idReferenceTmp'] ?>', '<?php echo addslashes($messages[$i]['intituleTmp']); ?>')">
				<?php echo $messages[$i]['nom'].' '.$messages[$i]['prenom']; ?>
			</td>
			<td class='cursor' onclick="javacript:openMessage('<?php echo $messages[$i]['idReferenceTmp'] ?>', '<?php echo addslashes($messages[$i]['intituleTmp']); ?>')">
				<?php echo $messages[$i]['intituleTmp']; ?>
			</td>
			<td class='cursor' onclick="javacript:openMessage('<?php echo $messages[$i]['idReferenceTmp'] ?>', '<?php echo addslashes($messages[$i]['intituleTmp']); ?>')">
				<?php
					if($messages[$i]['etatTmp'] == "Refusé"){
						echo "<span>".urldecode($messages[$i]['etatTmp'])."</span>";
					}else{
						echo urldecode($messages[$i]['etatTmp']);
					}
				?>
			</td>
			<td class='cursor' onclick="javacript:openMessage('<?php echo $messages[$i]['idReferenceTmp'] ?>', '<?php echo $messages[$i]['intituleTmp']; ?>')">
				<?php echo $messages[$i]['dateTmp']->format('d/m/Y H:i:s'); ?>
			</td>
		</tr>
<?php
	}
?>
	</table>
	
	<h4><i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;Autres messages</h4>
	<table class="table table-condensed" id="messArray">
		<tr class="titre">
			<th style="width:5%">&nbsp;</th>
			<th style="width:40%">De...</th>
			<th style="width:15%">Objet</th>
			<th style="width:15%">Etat</th>
			<th style="width:25%">Date</th>
		</tr>
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
			echo "<tr class='active'>";
		}else{
			echo "<tr>";
		}
?>
			<td id='messCheckbox'>
				<input type='checkbox' name='boxMess[]' <?php echo 'value="check'.$messages[$i]['idFormContact'].'"' ?> value=''>
			</td>
			<td class="cursor" onclick="javacript:openMessageContact(<?php echo $messages[$i]['idFormContact'] ?>, '<?php echo addslashes($messages[$i]['objet']); ?>')">
				<?php echo $messages[$i]['nom'].' '.$messages[$i]['prenom']; ?>
			</td>
			<td class="cursor" onclick="javacript:openMessageContact(<?php echo $messages[$i]['idFormContact'] ?>, '<?php echo addslashes($messages[$i]['objet']); ?>')">
				<?php echo $messages[$i]['objet']; ?>
			</td>
			<td class='cursor' onclick="javacript:openMessageContact(<?php echo $messages[$i]['idFormContact'] ?>, '<?php echo addslashes($messages[$i]['objet']); ?>')">
				<?php
					if($messages[$i]['lu'] == 0){
						echo "Non Lu";
					}else{
						echo "Lu";
					}
				?>
			</td>
			<td class='messTime, cursor' onclick="javacript:openMessageContact(<?php echo $messages[$i]['idFormContact'] ?>, '<?php echo addslashes($messages[$i]['objet']); ?>')">
				<p class="cursor" for="<?php echo "check".$i; ?>">
					<?php echo $messages[$i]['date']->format('d/m/Y H:i:s'); ?>
				</p>
			</td>
		</tr>
<?php
	}
?>
			</table>
			<input type='button' onclick="javascript:deleteMessages()" class='btn btn-danger' id='messDelete' name='messButton' value='Supprimer' style='float:right' />
		</div>
	</div>
</div>