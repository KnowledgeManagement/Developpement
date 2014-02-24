<?php
	session_start();
	include_once "../../../SQL/Fonctions_SQL/messagerie.php";
	include_once "../../../SQL/Fonctions_SQL/souscategorie.php";
	include_once "../../../SQL/Fonctions_SQL/categorie.php";
	include_once "../../../SQL/Fonctions_SQL/user.php";
	include_once "../../../SQL/Fonctions_SQL/search.php";
	$mot = $_POST['text'];
	/*$mot = "fonction";
	
	$document = findIntituleByWord($mot);
	*/
	$document = findTextByWord($mot);
	/*$array = array();
	for($i = 0; $i < sizeof($document); $i++){
		$array[] = $document[$i]['intituleDoc'];
	}
	
	echo json_encode($array);*/
	
?>
<table>
	<?php
		for($i = 0; $i < sizeof($document); $i++){
			echo "<tr>";
				echo "<td>".$document[$i]['intituleDoc']."</td>";
			echo "</tr>";
		}
	?>
</table>