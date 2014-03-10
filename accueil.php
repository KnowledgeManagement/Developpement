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
		<script type="text/javascript" src="JS/Jquery/jquery.js"></script>
		<script type="text/javascript" src="JS/Jquery/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="JS/Jquery/jquery.ui.js"></script>
		<script type="text/javascript" src="JS/sameLogs.js"></script>
		<script type="text/javascript" src="JS/passEmployees.js"></script>
		<script type="text/javascript" src="JS/mailBox.js"></script>
		<script type="text/javascript" src="JS/functions.js"></script>
		<script type="text/javascript" src="JS/manageMenus.js"></script>
		<script type="text/javascript" src="JS/prism.js"></script>
		<script type="text/javascript" src="JS/bootstrap.js"></script>
		<script type="text/javascript" src="JS/bootstrap.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src='JS/nprogress.js'></script>

		<link rel="stylesheet" href="css/accueil.css"/>
		<link rel="stylesheet" href="css/bouton.css"/>
		<link rel="stylesheet" href="css/sameLogs.css"/>
		<link rel="stylesheet" href="css/prism.css"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.css"/>
		<link rel="icon" type="image/png" href="Images/favicon.png" />
		<link rel='stylesheet' href='CSS/nprogress.css'/>
		
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    </head>
    <body>
	<?php
		if(isset($_SESSION['sameLogs'])){
			echo '<input type="hidden" id="sameLogs" value="1"/>';
		}
		if(isset($_POST['id']) && isset($_POST['intitule'])){
		?>
			<script type="text/javascript">
				window.onload=openMessage("<?php echo $_POST['id']; ?>", "<?php echo $_POST['intitule']; ?>");
			</script>
		<?php
	}
	?>
		<header id="header">
		</header>
		<!----------- CORPS DEBUT ----------->
		<section>
			<div id="middle">
				<div class="container-fluid">
				    <div class="row-fluid" id="row">
				     		<!--- PARTIE GAUCHE DEBUT --->
					      
					       	<div class="col-md-4">
					       		<span id="titleLeftContent" class="label label-default"></span>
									<div id="LeftContent">
										<!--<h3 id="titleLeftContent">Navigation</h3>-->
									</div>
					       	</div>
					       	<!--- PARTIE GAUCHE FIN --->
							
					       	<!--- PARTIE DROITE DEBUT --->
					       	<div class="col-md-8">
					       		<span id="titleRightContent" class="label label-default"></span>
									<div id="RightContent">
										<!--<h3 id="titleRightContent">Bienvenue</h3>-->
									</div>
					      	</div>

					       
					       <!--- PARTIE DROITE FIN --->
				    </div>
				</div>
			</div>
		</section>


		<!----------- CORPS FIN ----------->
		<!----------- FOOTER DEBUT ----------->
		<footer>
			<div class="form-inline panel panel-default">
				<div class="panel-body">
					COPYRIGHT © - Toute la documentation disponible sur cette application est confidentielle - Marianne et les 5 fantastiques - 2013/2014
				</div>
			</div>
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
				$('#LeftContent').html("");
				$('#RightContent').html(data);
				openbox("Attention : veuillez modifier votre mot de passe !", 1);
			}
		});
	}
	$.ajax({
		url : 'Defauts/Contenu/WhoIsIt.php',
		type :'POST', 
		success:function(data) 
		{
			$('#header').html(data);
		}
	});
	
});

$('body').show();
$('.version').text(NProgress.version);
NProgress.start();
setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
NProgress.start ();
NProgress.done ();

</script>