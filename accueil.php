<?php
	//Démarre une session
	session_start();
	include_once "SQL/Fonctions_SQL/categorie.php";
	include_once "SQL/Fonctions_SQL/souscategorie.php";
	include_once "SQL/Fonctions_SQL/messagerie.php";
	// Si aucune session n'est en cours, l'utilisateur est redirigé vers la page d'authentification
	if(!isset($_SESSION['id'])){
		header("location:index.php");
	}
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
		<link rel="stylesheet" href="css/sameLogs.css"/>
		<link rel="icon" type="image/png" href="Images/favicon.png" />
		<script type="text/javascript" src="JS/Jquery/jquery.js"></script>
        <script type="text/javascript" src="JS/Jquery/jquery.ui.js"></script>
		<script type="text/javascript" src="JS/sameLogs.js"></script>
		<script type="text/javascript" src="JS/passEmployees.js"></script>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    </head>
    <body>
	<?php
		if(isset($_SESSION['sameLogs'])){
			echo '<input type="hidden" id="sameLogs" value="1"/>';
		}
	?>
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
					<a href="#" id="boutonAjout">+</a>
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
							?>
								<li>
									<a href="#">
										Ma Messagerie
									</a>
								</li>
								<li>
									<a href="#" onclick="javascript:goToPage()">
										Gérer les mots de passe des employés
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
								<h3>Navigation</h3>
								<hr>
							</td>
						</tr>
						<tr>
							<td class="stuckRightNav">
								<div id="titleLeftContent">
									test
								</div>
							</td>
						</tr>
					</table>
					<!--- PARTIE GAUCHE FIN --->
					<!--- PARTIE DROITE DEBUT --->
					<table id="RightMainContent">	
						<tr>
							<td>
								<h3 id="titleRightContent">Bienvenue</h3>
								<hr>
								<div id="RightContent">
								
								</div>
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
<script type="text/javascript">
 $(document).ready(function() {
	if(document.getElementById("sameLogs")){
		$.ajax({
			url : 'Defauts/Contenu/sameLogs/pleaseModifyPassword.php',
			type :'POST', 
			success:function(data) 
			{
				$('#RightContent').html(data);
				openbox("Attention : veuillez modifier votre mot de passe !", 1);
			}
		});
	}
});
</script>