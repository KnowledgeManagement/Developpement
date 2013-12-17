<?php
	//Démarre une session
	session_start();
	include_once "SQL/Fonctions_SQL/categorie.php";
	include_once "SQL/Fonctions_SQL/souscategorie.php";
	include_once "SQL/Fonctions_SQL/messagerie.php";
	// Si aucune session n'est en cours, l'utilisateur est redirigé vers la page d'authentification
	
?>
<!DOCTYPE html>
<html>
    <head>
		<!-- Titre de l'onglet des pages web -->
        <title>PROJET KM // Base de Connaissances de Marianne et les 5 fantastiques</title>
		<meta charset="utf-8"/>
		<!-- Insertion du CSS et du Favicon -->
		<link rel="stylesheet" href="css/accueil.css"/>
		<link rel="stylesheet" href="css/bouton.css"/>
		<link rel="icon" type="image/png" href="Images/favicon.png" />
    </head>
    <body>
	<!----------- HEADER DEBUT ----------->
		<header>
			<!--- LOGO + BARRE DE RECHERCHE --->
			<a href="accueil.php"><img id="logo" src="Images/logo.png" alt="Logo"/></a>
			<input id="search" type="text" placeholder="Rechercher..." name="rechercher" />
			<?php
				/* Selectionne les catégories par ordre d'identifiant */
				$lesCate = getAllCategorie();
				for($i = 0; $i < sizeof($lesCate); $i++){
			?>
				<!--- MENU/SOUS-MENU DEBUT --->
				<div class="menu">
					<ul>
						<li><a href="#"><?php echo $lesCate[$i]['nomCat']; ?></a>
							<ul>
								<?php
									$SousMenu = getSousCategorieByCategorie($lesCate[$i]['idCat']);
									if(isset($SousMenu)){
										for($j = 0; $j < sizeof($SousMenu); $j++){
									?>
										<li><a href="#"><?php echo $SousMenu[$j]['nomSousCat']; ?></a></li>
									<?php
										}
									}
								?>
							</ul>
						</li>
					</ul>
				</div>
				<!--- MENU/SOUS-MENU FIN --->
			<!--- Si administrateur > Ajout d'un bouton de gestion des menus
				  Si différent d'administrateur > Ajout d'un onglet pour contacter l'administrateur --->
			<?php
				}
				if($_SESSION['fonction'] == "Administrateur"){
			?>
				<div id="add">
					<a href="gerer_menu.php" id="boutonAjout">+</a>
				</div>
			<?php
				}
				if($_SESSION['fonction'] != "Administrateur"){
			?>			
				<div id="help">
					<a href="#">?</a>
				</div>
			<?php
				}
			?>
			<!--- MENU UTILISATEUR DEBUT --->
			<div id="UserMenu">
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
								$notRead = countMessNotRead();
							?>
								<li>
									<a href="messagerie.php">
										Ma Messagerie
									</a>
								</li>
							<?php
								}
							?>
							<li><a href="Defauts/Contenu/deconnexion.php">Déconnexion</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!--- MENU UTILISATEUR FIN --->
		</header>
		<!----------- HEADER FIN ----------->
		<!----------- CORPS DEBUT ----------->
		<section>
			<div id="middle">
					<!--- PARTIE GAUCHE DEBUT --->
					<table id="LeftMainContent">
						<tr>
							<td>
								<h3>Menu</h3>
								<hr>
							</td>
						</tr>
						<tr>
							<td>
								<?php 
									if($_SESSION['fonction'] == "Administrateur"){
										for($i = 0; $i < sizeof($lesCate); $i++){
											echo $lesCate[$i]['nomCat'].'<br/>'; 
											$SousMenu = getSousCategorieByCategorie($lesCate[$i]['idCat']);
												if(isset($SousMenu)){
													for($j = 0; $j < sizeof($SousMenu); $j++){
														echo '<span class="tab">'.$SousMenu[$j]['nomSousCat'].'</span><br/>'; 
												}
											}
											echo '<br/>';
										}
									}
								?>
							</td>
						</tr>
					</table>
					<!--- PARTIE GAUCHE FIN --->
					<!--- PARTIE DROITE DEBUT --->
					<table id="RightMainContent">	
						<tr>
							<td>
								<h3>Gérer les menus<input type="button" value="Nouveau" class="bouton" id="menu_button_title"></h3>
								<hr>
								<?php 
									if($_SESSION['fonction'] != "Administrateur"){
								?>
									Vous n'avez pas accès à cette page !
								<?php
									}
								?>
								<?php 
									if($_SESSION['fonction'] == "Administrateur"){
										for($i = 0; $i < sizeof($lesCate); $i++){
											echo '<table class="menu_tab">';
											echo '<tr>';
											echo '<td class="menu_cat">'.$lesCate[$i]['nomCat'].'</td>'; 
											echo '<td class="menu_button"><input type="button" value="Modifier" class="bouton"></td>';
											echo '<td class="menu_button"><input type="button" value="Supprimer" class="bouton"></td>';
											echo '</tr>';
											$SousMenu = getSousCategorieByCategorie($lesCate[$i]['idCat']);
												if(isset($SousMenu)){
													for($j = 0; $j < sizeof($SousMenu); $j++){
														echo '<tr>';
														echo '<td class="menu_sous_cat">'.$SousMenu[$j]['nomSousCat'].'</td>';
														echo '<td class="menu_button"><input type="button" value="Modifier" class="bouton"></td>';
														echo '<td class="menu_button"><input type="button" value="Supprimer" class="bouton"></td>';
														echo '</tr>';
													}
												}
											echo '</table>';
											echo '<hr style="width:80%"/>';
											echo '<center><input type="button" value="Nouveau" id="menu_button_new" class="bouton"></center>';
											echo '<hr style="width:80%"/>';
										}
									}
								?>
							</td>
						</tr>
					</table>
					<!--- PARTIE DROITE FIN --->
			</div>
		</section>
		<!----------- CORPS FIN ----------->
		<!----------- FOOTER DEBUT ----------->
		<footer>
			COPYRIGHT © - Toute la documentation disponible sur cette application est confidentielle - Marianne et les 5 fantastiques - 2013 
		</footer>
		<!----------- FOOTER FIN ----------->
	</body>
</html>