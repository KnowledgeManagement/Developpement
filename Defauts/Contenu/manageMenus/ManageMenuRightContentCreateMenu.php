<?php

include_once "../../../SQL/Fonctions_SQL/categorie.php";
include_once "../../../SQL/Fonctions_SQL/souscategorie.php";

?>

<form name="form_create_menu">
		<label>Nom :</label>
		<input type="text"  name="text_create_menu" class="input_text"/>
		<input type="submit" value="Créer" name="button_create_menu" class="bouton" onclick="javascript:goToManageMenusRightContent();"/>
		<input type="button" value="Retour" name="button_back" class="bouton" onclick="javascript:goToManageMenusRightContent();">
</form>