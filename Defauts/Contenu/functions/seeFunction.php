<?php
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	//intituleDoc, idReference, date, description, exemple, lienTelechargement
	$idReference = $_POST['idReference'];
	$infos = getFunctionBySousCategorie($idReference);
	
?><br/>
<b>Dernière modification : </b><?php echo $infos[0]['date']->format('d/m/Y H:i:s'); ?><br/><br/>
<b>Description : </b><br/>
<?php echo $infos[0]['description']; ?><br/><br/>
<i>Cliquez pour sélectionner : </i><br/>PRISM:
<?php echo $infos[0]['exemple']; ?><br/><br/>

<div style="">
	<input type="button" class="bouton" value="Aperçu"/>
	<input type="button" class="bouton" value="Télécharger"/>
	<input type="button" class="bouton" value="Modifier"/>
</div>