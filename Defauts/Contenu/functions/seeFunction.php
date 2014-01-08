<?php
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	//intituleDoc, idReference, date, description, exemple, lienTelechargement
	$idReference = $_POST['idReference'];
	$infos = getFunctionBySousCategorie($idReference);
	
?><br/>
<link rel="stylesheet" href="CSS/prism.css"/>
<script type="text/javascript" src="JS/prism.js"></script>
<b>Dernière modification : </b><?php echo $infos[0]['date']->format('d/m/Y H:i:s'); ?><br/><br/>
<b>Description : </b><br/>
<?php echo $infos[0]['description']; ?><br/><br/>
<b>Exemple : </b><br/>
<p id="exemple"><?php echo $infos[0]['exemple']; ?></p><br/>

<div style="">
	<input type="button" class="bouton" value="Aperçu"/>
	<input type="button" class="bouton" value="Télécharger"/>
	<input type="button" class="bouton" value="Modifier"/>
</div>
<script type="text/javascript">
	$( document ).ready(function() {
		Prism.highlightAll();
	});
</script>
