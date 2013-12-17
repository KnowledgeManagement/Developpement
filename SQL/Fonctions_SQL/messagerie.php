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

/* Renvoie le nombre de messages lus dans la messagerie
*/
function countMessRead(){
	$s1 = run("select count(idMessage) as Nb
				from m5f_message
				where etat='lu';");
	$s2 =  run("select count(idFormContact) as Nb
				from m5f_contact
				where lu=1;");
	
	return ($s1[0]['Nb']+$s2[0]['Nb']);
}

/* Renvoie le nombre de messages lus et non lus dans la messagerie
*/
function countMessAllRead(){
	$s1 = run("select count(idMessage) as Nb
				from m5f_message;");
	$s2 =  run("select count(idFormContact) as Nb
				from m5f_contact;");
	
	return ($s1[0]['Nb']+$s2[0]['Nb']);
}


function GetMess(){
 $s1 = run("SELECT M.intitule, M.date, M.etat, U.nom, U.prenom
		FROM m5f_message M, m5f_user U
		WHERE M.idUser = U.idUser
		ORDER BY M.etat DESC;");
return $s1;
}
?>