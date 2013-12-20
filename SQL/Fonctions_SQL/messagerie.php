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
				where etat!='Non Lu';");
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


function getAllMess(){
	 $s1 = run("SELECT M.idMessage, M.commentaires, M.intitule, M.date, M.etat, U.nom, U.prenom
			FROM m5f_message M, m5f_user U
			WHERE M.idUser = U.idUser
			ORDER BY M.date desc");
	return $s1;
}

function getMessRead(){
	 $s1 = run("SELECT M.idMessage, M.commentaires, M.intitule, M.date, M.etat, U.nom, U.prenom
			FROM m5f_message M, m5f_user U
			WHERE M.idUser = U.idUser
			AND M.etat != 'Non Lu'
			order by M.date desc");
	return $s1;
}
function getMessNotRead(){
	 $s1 = run("SELECT M.idMessage, M.commentaires, M.intitule, M.date, M.etat, U.nom, U.prenom
			FROM m5f_message M, m5f_user U
			WHERE M.idUser = U.idUser
			AND M.etat = 'Non Lu'
			order by date desc");
	return $s1;
}

function getMessageById($id){
	$s1 = run("SELECT M.intitule, M.contenu, M.date, M.etat, U.nom, U.prenom, m5f_categorie.nomCat, m5f_sous_categorie.nomSousCat 
			FROM m5f_categorie, m5f_sous_categorie, m5f_message M, m5f_user U
			where M.idSousCat = m5f_sous_categorie.idSousCat
			and m5f_sous_categorie.idCat = m5f_categorie.idCat
			and M.idUser = U.idUser
			AND M.idMessage = ".$id);
	return $s1;
}

function setMessageRead($id){
	$s1 = run("Update m5f_message set etat = 'Lu' where idMessage = ".$id);
}

function setMessageAccepted($id){
	$s1 = run("Update m5f_message set etat = 'Accepté' where idMessage = ".$id);
}

function setMessageRefused($id){
	$s1 = run("Update m5f_message set etat = 'Refusé' where idMessage = ".$id);
}
?>