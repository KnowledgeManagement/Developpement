<?php

include_once "../../../SQL/Fonctions_SQL/categorie.php";
include_once "../../../SQL/Fonctions_SQL/souscategorie.php";

?>

<form name="form_edit_menu">
		<label>Nom :</label>
		<input type="text" value="" name="text_edit_menu" class="input_text"  />
		<input type="submit" value="Modifier" name="button_edit_menu" class="bouton" onclick="javascript:goToManageMenusRightContent();"/>
		<input type="button" value="Retour" name="button_back" class="bouton" onclick="javascript:goToManageMenusRightContent();">
</form>