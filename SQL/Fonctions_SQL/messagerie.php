<?php
include_once("connexion.php");

/* Renvoie le nombre de messages non lus dans la messagerie
*/
function countMessNotRead(){
	$s1 = run("select count(idReferenceTmp) as Nb
				from m5f_tmp
				where etatTmp='Non Lu'");
	$s2 =  run("select count(idFormContact) as Nb
				from m5f_contact
				where lu=0;");
	
	return ($s1[0]['Nb']+$s2[0]['Nb']);
}

/* Renvoie le nombre de messages lus dans la messagerie
*/
function countMessRead(){
	$s1 = run("select count(idReferenceTmp) as Nb
				from m5f_tmp
				where etatTmp!='Non Lu';");
	$s2 =  run("select count(idFormContact) as Nb
				from m5f_contact
				where lu=1;");
	
	return ($s1[0]['Nb']+$s2[0]['Nb']);
}

/* Renvoie le nombre de messages lus et non lus dans la messagerie
*/
function countMessAllRead(){
	$s1 = run("select count(idReferenceTmp) as Nb
				from m5f_tmp;");
	$s2 =  run("select count(idFormContact) as Nb
				from m5f_contact;");
	
	return ($s1[0]['Nb']+$s2[0]['Nb']);
}


function getAllMess(){
	 $s1 = run("SELECT M.idReferenceTmp, M.commentaireTmp, M.intituleTmp, M.dateTmp, M.etatTmp, U.nom, U.prenom
			FROM m5f_tmp M, m5f_user U
			WHERE M.idUser = U.idUser
			ORDER BY M.dateTmp desc");
	return $s1;
}

function getMessRead(){
	 $s1 = run("SELECT M.idReferenceTmp, M.commentaireTmp, M.intituleTmp, M.dateTmp, M.etatTmp, U.nom, U.prenom
			FROM m5f_tmp M, m5f_user U
			WHERE M.idUser = U.idUser
			AND M.etatTmp != 'Non Lu'
			order by M.dateTmp desc");
	return $s1;
}
function getMessNotRead(){
	 $s1 = run("SELECT M.idReferenceTmp, M.intituleTmp, M.dateTmp, M.etatTmp, U.nom, U.prenom
			FROM m5f_tmp M, m5f_user U
			WHERE M.idUser = U.idUser
			AND M.etatTmp = 'Non Lu'
			order by dateTmp desc");
	return $s1;
}

function getMessageById($id){
	$s1 = run("SELECT M.intituleTmp, M.descriptionTmp, M.exempleTmp, M.dateTmp, M.etatTmp, U.nom, U.prenom, m5f_categorie.nomCat, m5f_sous_categorie.nomSousCat
			from m5f_tmp M, m5f_user U, m5f_categorie, m5f_sous_categorie
			where M.idSousCat = m5f_sous_categorie.idSousCat
			and m5f_sous_categorie.idSousCat = M.idSousCat
			and m5f_sous_categorie.idCat = m5f_categorie.idCat
			and M.idUser = U.idUser
			AND M.idReferenceTmp = '".$id."'");
	return $s1;
}

function setMessageRead($id){
	$s1 = run("Update m5f_tmp set etatTmp = 'Lu' where idReferenceTmp = '".$id."'");
}

function setMessageAccepted($id, $comm){
	$s1 = run("Update m5f_tmp set etatTmp = 'Accepté', commentaireTmp = '".$comm."' where idReferenceTmp = '".$id."'");
}

function setMessageRefused($id, $comm){
	$s1 = run("Update m5f_message set etat = 'Refusé', commentaireTmp = '".$comm."' where idReferenceTmp = '".$id."'");
}

function getAllMessContact(){
	 $s1 = run("SELECT C.idFormContact, C.objet, C.contenu, C.date, C.lu, U.nom, U.prenom
			FROM m5f_contact C, m5f_user U
			WHERE C.idUser = U.idUser
			ORDER BY C.date desc");
	return $s1;
}

function getMessReadContact(){
	 $s1 = run("SELECT C.idFormContact, C.objet, C.contenu, C.date, C.lu, U.nom, U.prenom
			FROM m5f_contact C, m5f_user U
			WHERE C.idUser = U.idUser
			AND C.lu = 1
			order by C.date desc");
	return $s1;
}
function getMessNotReadContact(){
	 $s1 = run("SELECT C.idFormContact, C.objet, C.contenu, C.date, C.lu, U.nom, U.prenom
			FROM m5f_contact C, m5f_user U
			WHERE C.idUser = U.idUser
			AND C.lu = 1
			order by date desc");
	return $s1;
}

function getMessageByIdContact($id){
	$s1 = run("SELECT C.objet, C.contenu, C.date, C.lu, U.nom, U.prenom
			FROM m5f_contact C, m5f_user U
			where C.idUser = U.idUser
			AND C.idFormContact = ".$id);
	return $s1;
}

function setMessageReadContact($id){
	$s1 = run("Update m5f_contact set lu = '1' where idFormContact = ".$id);
}

function deleteMessages($id){
	$s1 = run("delete from m5f_tmp where idReferenceTmp = '".$id."'");
}
function deleteMessagesContact($id){
	$s1 = run("delete from m5f_contact where idFormContact = ".$id);
}
?>