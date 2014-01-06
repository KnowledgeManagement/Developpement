<?php
	session_start();
	include_once "../../SQL/Fonctions_SQL/messagerie.php";
?>
<ul>
	<li>
		<a href="#">
			<?php
				if($_SESSION['fonction'] == "Administrateur"){
					$notRead = countMessNotRead();
					echo "<span title='Messages non lus'>(".$notRead.") </span>";
				}
				echo $_SESSION['nom'];
			?>
		</a>
		<ul>
			<?php
				if($_SESSION['fonction'] == "Administrateur"){
			?>
				<li>
					<a href="#" onclick="javascript:goToMailBoxRightContent('allMessages');goToMailBoxLeftContent()">
						Ma Messagerie
					</a>
				</li>
				<li>
					<a href="#" onclick="javascript:goToPage();goToPageLeft()">
						Gérer les mots de passe
					</a>
				</li>
			<?php
				}
			?>
			<li><a href="Defauts/Contenu/deconnexion.php">Déconnexion</a></li>
		</ul>
	</li>
</ul>