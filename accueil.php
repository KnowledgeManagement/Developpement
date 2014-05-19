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
		<!--<div style="position : absolute; top : 0px; left : 0px; z-index : 100; opacity : 0.5; width : 100%; height : 100%;"><img src='Images/dessin.png' style="width : 100%; height : 100%;" alt="no"/></div>-->
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
		<?php
			if($_SESSION['fonction'] != "Administrateur"){
		?>
			<a href="#" id="buttonHelp" title="Afficher l'aide" onclick="javascript:changeHelp();" style="position : fixed; bottom : 15px; left : 10px; z-index : 101;"><i class="glyphicon glyphicon-question-sign"></i></a>
		<?php
			}
		?>		
		<!----------- FOOTER FIN ----------->
		<input type="hidden" id="help" value="1"/>
		<div id="helpDiv" style="z-index : 100; position : absolute; top : 0px; left : 0px; opacity : 0.2; background-color : black; width : 100%; height : 100%; display : none;"></div>
		<div id="helpAppears" style="position : absolute; z-index : 50;"></div>
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
	showHelp();
});

function showHelp(){
	if(document.getElementById("help").value == 0){
		document.getElementById("helpDiv").style.display = "block";
		$('#LeftContent').html("");
		$('#titleRightContent').html("");
		$('#RightContent').html("");
		$("#titleLeftContent").html("");
	}else{
		document.getElementById("helpDiv").style.display = "none";
	}
}

function changeHelp(){
	if(document.getElementById("help").value == 1){
		document.getElementById("help").value = 0;
		document.getElementById("buttonHelp").title = "Enlever l'aide";
		showHelp();
		showHelpWhoIsIt();
		$.ajax({
			url : 'Defauts/Contenu/help/divHelp.html',
			type :'GET', 
			success:function(data) 
			{
				$('#helpAppears').html(data);
				document.getElementById("researchBarre").style.left = document.getElementById('search').offsetLeft+10+"px";
				document.getElementById("researchBarre").style.top = document.getElementById('search').offsetTop+38+"px";
				document.getElementById("filtreMenu").style.left = document.getElementById('myButton').offsetLeft+40+"px";
				document.getElementById("filtreMenu").style.top = document.getElementById('myButton').offsetTop+33+"px";
				document.getElementById("menuNavigation").style.left = document.getElementById('menuNav').offsetLeft+40+"px";
				document.getElementById("menuNavigation").style.top = document.getElementById('menuNav').offsetTop+56+"px";
				document.getElementById("myAccount").style.left = document.getElementById('UserMenu').offsetLeft-80+"px";
				document.getElementById("myAccount").style.top = document.getElementById('UserMenu').offsetTop+43+"px";
				document.getElementById("contact").style.left = document.getElementById('UserMenu').offsetLeft+33+"px";
				document.getElementById("contact").style.top = document.getElementById('UserMenu').offsetTop+43+"px";
			}
		});
	}else{
		document.getElementById("help").value = 1;
		document.getElementById("buttonHelp").value = "Afficher l'aide";
		showHelp();
		showHelpWhoIsIt();
		$('#helpAppears').html("");
	}
	//menuNavigation
}

$('body').show();
$('.version').text(NProgress.version);
NProgress.start();
setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
NProgress.start ();
NProgress.done ();

</script>