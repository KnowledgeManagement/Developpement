<?php
	include_once "../../../SQL/Fonctions_SQL/user.php";
	if(isset($_POST['idUser'])){//Réinitialise le mot de passe d'un utilisateur
		$findLogin = getUserById($_POST['idUser']);
		$login = $findLogin[0]['login'];
		modifyPassword($_POST['idUser'], $login);
		echo '<span class="alert">Le mot de passe a bien été réinitialisé.</span>';
	}
?>
<table id="tabListUsers">
	<tr>
		<th>Nom</th>
		<th>Prénom</th>
		<th>&nbsp;</th>
	</tr>
	<?php
		$listOfUsers = getAllUser();
		for($j = 0; $j < sizeof($listOfUsers); $j++){
			?>
				<tr>
					<td>
						<?php echo $listOfUsers[$j]['nom'];?>
					</td>
					<td>
						<?php echo $listOfUsers[$j]['prenom']; ?>
					</td>
					<td>
						<input type="button" class="bouton" style="width:150px;" onclick="javascript:reinitPass(<?php echo $listOfUsers[$j]['idUser']; ?>)" value="Réinitialiser mdp"/>
					</td>
				</tr>
			<?php
		}
	?>
</table>