<?php

include_once "../../../SQL/Fonctions_SQL/categorie.php";
include_once "../../../SQL/Fonctions_SQL/souscategorie.php";

?>

<form name="form_add_sous_menu">
		<label style="font-weight:italic;font-size:11px">Vous allez modifier "sous-menu" rattaché à "Menu".</label>
		<br/>
		<label>Nom :</label>
		<input type="text"  name="text_add_menu" class="input_text"/>
		<input type="submit" value="Ajouter" name="button_add_sous_menu" class="bouton" onclick="javascript:goToManageMenusRightContent();"/>
		<input type="button" value="Retour" name="button_back" class="bouton" onclick="javascript:goToManageMenusRightContent();">
</form>