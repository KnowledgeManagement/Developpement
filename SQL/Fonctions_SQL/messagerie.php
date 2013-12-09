<?php
include_once("connexion.php");

/* Renvoie le nombre de messages non lus dans la messagerie
*/
function countMessNotRead(){
	$s1 = run("select count(idMessage) as Nb
				from m5f_message
				where etat='Non lu';");
	$s2 =  run("select count(idFormContact) as Nb
				from m5f_contact
				where lu=0;");
	
	return ($s1[0]['Nb']+$s2[0]['Nb']);
}
?>