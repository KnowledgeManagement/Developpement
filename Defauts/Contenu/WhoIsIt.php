<?php
	session_start();
	include_once "../../SQL/Fonctions_SQL/messagerie.php";
	include_once "../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../SQL/Fonctions_SQL/souscategorie.php";
	/* Selectionne les catégories par ordre d'identifiant */
	$lesCate = getAllCategorie();
?>
<!--- MENU UTILISATEUR DEBUT --->
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
<!----------- HEADER DEBUT ----------->
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid" style="padding-left:40px">
		<div class="navbar-header">
			<a class="navbar-brand" href="accueil.php"><i class="glyphicon glyphicon-home"></i> <b>M5F</b></a>
		</div>
		<form class="navbar-form navbar-left" role="search">
			<div class="form-group" style="margin-bottom:-24px">
				<span class="menu">
					<ul class="nav navbar-nav">
						<li class="dropdown"><a href="#" class="filtre dropdown-toggle" data-toggle="dropdown"><i id="myButton" class="glyphicon glyphicon-th-large dropdown dropdown-toggle"  data-toggle="dropdown" title="Filtres"></i></a>
							<ul class="dropdown-menu" id="filter">
								<li style="margin-bottom:10px"><a href="#" class="btn btn-danger btn-sm" style="color:white;" onclick="javascript:deleteFilter()"><i class="glyphicon glyphicon-remove-sign"></i>&nbsp;&nbsp;Supprimer les filtres</a></li>
								<?php
								for($i = 0; $i < sizeof($lesCate); $i++){
								?>
									<!--- MENU/SOUS-MENU DEBUT --->
									<li class="filter_contenu">
										<label style="color:#428bca;font-weight:normal"><input type="checkbox" onclick="javascript:allCheck(<?php echo $lesCate[$i]['idCat']; ?>)" name="cate" value="<?php echo $lesCate[$i]['idCat']; ?>" style="margin-right:10px" /><?php echo $lesCate[$i]['nomCat'] ?><i class="glyphicon glyphicon-folder-open" style="margin-left:10px"></i></label><br/>
									</li>
									<li class="filter_contenu" style="margin-left:20px;">
										<?php
											$SousMenu = getSousCategorieByCategorie($lesCate[$i]['idCat']);
											if(isset($SousMenu)){
												for($j = 0; $j < sizeof($SousMenu); $j++){
											?>
												<input onclick="javascript:checkSousCat(<?php echo $SousMenu[$j]['idSousCat']; ?>)" type="checkbox" name="sousCat" value="<?php echo $SousMenu[$j]['idSousCat']; ?>" style="margin-right:10px" /><?php echo $SousMenu[$j]['nomSousCat']."</span><br/>"; ?>
											<?php
												}
											}
										?>
									</li>
								<?php
								}
								?>
							</ul>
						</li>
					</ul>
				</span>
				<input type="text" id="search" class="form-control" onkeyup="onSearch()" placeholder="Rechercher..." autocomplete="off" name="rechercher">
			</div>
		</form>
		<div id="menuNav" class="nav navbar-nav">
			<?php
				for($i = 0; $i < sizeof($lesCate); $i++){
			?>
			<!--- MENU/SOUS-MENU DEBUT --->
			<span class="menu" id="menuNav">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a href="#" class="titre_menu dropdown-toggle" data-toggle="dropdown"><?php echo $lesCate[$i]['nomCat']; ?></a>
						<ul class="dropdown-menu">
							<?php
								$SousMenu = getSousCategorieByCategorie($lesCate[$i]['idCat']);
								
								if(isset($SousMenu)){
									for($j = 0; $j < sizeof($SousMenu); $j++){
								?>
									<li><a href="#" onclick="javascript:goToFunction(<?php echo $SousMenu[$j]['idSousCat']; ?>)"><i class="glyphicon glyphicon-hand-right"></i>&nbsp;&nbsp;<?php echo $SousMenu[$j]['nomSousCat']; ?></a></li>
								<?php
									}
								}
							?>
						</ul>
					</li>
				</ul>
			</span>
			<?php
				}
			?>
		</div>
		<!--- MENU/SOUS-MENU FIN --->
		<!--- Si administrateur > Ajout d'un bouton de gestion des menus
			  Si différent d'administrateur > Ajout d'un onglet pour contacter l'administrateur --->
		<?php
			if($_SESSION['fonction'] == "Administrateur"){
		?>
			<span id="add">
				<a href="#" class="glyphicon glyphicon-plus-sign" onclick="javascript:goToManageMenusRightContent();goToManageMenusLeftContent();"></a>
			</span>
		<?php } ?>

		<div style="display: inline;" class="pull-right" id="UserMenu">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="titre_menu dropdown-toggle" data-toggle="dropdown">
						<span id="nameOfPerson" style="padding : 5px;">
							<?php
								if($_SESSION['fonction'] == "Administrateur"){
									$notRead = countMessNotRead();
									echo "<span title='Messages non lus' class='badge'>".$notRead."</span>&nbsp;";
								}
								echo $_SESSION['nom'];
							?>
						</span>
					</a>
					<ul class="dropdown-menu" style="margin-left : -30px;">
						<?php
							if($_SESSION['fonction'] == "Administrateur"){
						?>
							<li>
								<a href="#" style="margin-top : 2px;" onclick="javascript:goToMailBoxRightContent('allMessages');goToMailBoxLeftContent()">
									<i class="glyphicon glyphicon-envelope"></i> Ma Messagerie
								</a>
							</li>
							<li>
								<a href="#" onclick="javascript:goToPage();goToPageLeft()">
									<i class="glyphicon glyphicon-wrench"></i> Gérer les mots de passe
								</a>
							</li>
						<?php
							}else if($_SESSION['fonction'] == "Contributeur"){
						?>
							<li>
								<a href="#" onclick="javascript:seeMyAsking()">
									<i class="glyphicon glyphicon-wrench"></i> Gérer mes demandes
								</a>
							</li>
						<?php
							}
						?>
						<li><a href="Defauts/Contenu/deconnexion.php">
								<i class="glyphicon glyphicon-off"></i> Déconnexion
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<?php 
				if($_SESSION['fonction'] != "Administrateur"){
			?>			
				<a href="#" id="seeContact" style="margin-top : 15px; padding : 2px;" class="glyphicon glyphicon-question-sign"></a>
			<?php 
				}	
			?>
		</div>
	</div>
</nav> 
<div id="searchResult" style="display : none; border : solid black 1px; width : 1000px; position : absolute; z-index : 50; background-color : white; color : black;">

</div>
<!--- MENU UTILISATEUR FIN --->
<script type="text/javascript">
function onSearch(){
	if(document.getElementById('search').value == ""){
		document.getElementById('searchResult').style.display = "none";
	}else{
		var myArray = new Array();
		var indice = 0;
		for(var j = 0; j < document.getElementsByName("sousCat").length; j++){
			if(document.getElementsByName("sousCat")[j].checked == true){
				myArray.push(document.getElementsByName("sousCat")[j].value);
				indice++;
			}
		}
		if(indice == 0){
			myArray.push(0);
		}
		$.ajax({
			url : 'Defauts/Contenu/searchBox/findWord.php',
			data : {text : document.getElementById('search').value, maListe : myArray},
			dataType : "TEXT",
			type :'POST', 
			success:function(data) 
			{
				document.getElementById('searchResult').style.display = "block";
				document.getElementById('searchResult').style.top = "50px";
				document.getElementById('searchResult').style.left = document.getElementById('search').offsetLeft+"px";
				$("#searchResult").html(data);
			}
		});
		document.getElementById("search").focus();
	}
}

function getFiltre(){
	if(document.getElementById("filter").style.display == "none"){
		document.getElementById('filter').style.display = "block";
		document.getElementById('filter').style.top = "50px";
		document.getElementById('filter').style.left = document.getElementById('myButton').offsetLeft-120+"px";
	}else{
		document.getElementById('filter').style.display = "none";
	}
}

function deleteFilter(){
	for(var i = 0; i < document.getElementsByName("cate").length; i++){
		document.getElementsByName("cate")[i].checked = false;
	}
	for(var i = 0; i < document.getElementsByName("sousCat").length; i++){
		document.getElementsByName("sousCat")[i].checked = false;
	}
	onSearch();
}

function allCheck(idCat){
	$.ajax({
		url : 'Defauts/Contenu/searchBox/getSousCat.php',
		data : {idCat : idCat},
		dataType : "TEXT",
		type :'POST', 
		success:function(data) 
		{
			var sousCat = eval("("+data+")");
			
			for(var i = 0; i < document.getElementsByName("cate").length; i++){
				if(document.getElementsByName("cate")[i].value == idCat){
					if(document.getElementsByName("cate")[i].checked == false){
						for(var i = 0; i < sousCat.length; i++){
							for(var j = 0; j < document.getElementsByName("sousCat").length; j++){
								if(sousCat[i] == document.getElementsByName("sousCat")[j].value){
									document.getElementsByName("sousCat")[j].checked = false;
								}
							}
						}
					}else{
						for(var i = 0; i < sousCat.length; i++){
							for(var j = 0; j < document.getElementsByName("sousCat").length; j++){
								if(sousCat[i] == document.getElementsByName("sousCat")[j].value){
									document.getElementsByName("sousCat")[j].checked = true;
								}
							}
						}
					}
				}
			}
			onSearch();
		}
	});
}

function checkSousCat(){
	onSearch();
}

$(document).ready(function() {
	showHelpWhoIsIt();
});

function showHelpWhoIsIt(){
	if(document.getElementById("help").value == 0){
		document.getElementById("search").style.border = "solid red 2px";
		document.getElementById("myButton").style.border = "solid red 2px";
		document.getElementById("myButton").style.padding = "5px";
		document.getElementById("menuNav").style.border = "solid red 2px";
		document.getElementById("nameOfPerson").style.border = "solid red 2px";
		document.getElementById("seeContact").style.border = "solid red 2px";
	}else{
		document.getElementById("search").style.border = "1px solid #ccc";
		document.getElementById("myButton").style.border = "none";
		document.getElementById("menuNav").style.border = "none";
		document.getElementById("nameOfPerson").style.border = "none";
		document.getElementById("seeContact").style.border = "none";
	}
}

</script>