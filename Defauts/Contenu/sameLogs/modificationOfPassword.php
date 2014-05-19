<?php
	session_start();
	include("../../../SQL/Fonctions_SQL/user.php");
	$pass = $_POST['id'];
	modifyPassword($_SESSION['id'], $pass);
	unset($_SESSION['sameLogs']);
	echo $_SESSION['fonction'];

?>