<?php

// TO DO
//	REQUETE SQL INSERTION BDD des valeurs POST RECU TABLE TMP
//	REMOVE FICHIER COTE ADMINISTRATEUR SI MAIL NON-VALIDE
//	REQUETE LIENTELECHARGEMENT DANS BDD
//	CHANGER LE WHILE PAR UNE VERIFICATION PAR REFERENCE DANS LA BDD

	session_start();
	include_once("../../../SQL/Fonctions_SQL/souscategorie.php");
	include_once("../../../SQL/Fonctions_SQL/categorie.php");
	include_once("../../../SQL/Fonctions_SQL/messagerie.php");
	
	//-----------------------------------------------
	// FONCTION NOMBRE ALEATOIRE
	//-----------------------------------------------	
	
	function generateRandomString($length = 5)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	$categorie = getCategorieById($_POST['categorie']);
	$souscategorie = getsousCategorieById($_POST['sousCategorie']);
	$uploaddir = '\dlExemples\\'. utf8_decode($categorie[0]['nomCat']).'\\'.utf8_decode($souscategorie[0]['nomSousCat']).'\\';

	// Création du dossier courrant s'il n'existe pas
	$result = mkdir($uploaddir, 0777, true);
	
	$extension = explode('.',$_FILES['pj']['name']);
	$reference = generateRandomString();
	$uploadfile = $uploaddir.$reference;
	
	// Vérifie que la référence n'existe pas
	while(file_exists($uploadFile))
	{
		$uploadfile = $uploaddir.generateRandomString();
	}

	// Upload le fichier sur le serveur
	move_uploaded_file($_FILES['pj']['tmp_name'], $uploadfile.'.'.$extension[1]);

	addFunctionBddTmp(utf8_decode($reference), utf8_decode($_POST['intitule']),$_POST['description'],'"'.$_POST['exemple'].'"',$uploadfile.'.'.$extension[1],$_POST['sousCategorie'],$_SESSION['id']);
	// Ajoute le formulaire dans la base de donnée
	//----------------------------------------------- 
	//GENERE LA FRONTIERE DU MAIL ENTRE TEXTE ET HTML 
	//----------------------------------------------- 

	//$frontiere = '-----=' . md5(uniqid(mt_rand())); 

	//----------------------------------------------- 
	//DECLARE LES VARIABLES 
	//----------------------------------------------- 

	/*$email_expediteur='thomasdebas@m5f.fr'; 
	$email_reply='thomas.debas@epsi.fr'; 
	$message_html=
	'<html> 
		<head> 
			<title>Démonstration de code !!!</title> 
		</head> 
			<body>Test de message</body> 
	</html>';*/

	//----------------------------------------------- 
	//HEADERS DU MAIL 
	//----------------------------------------------- 

	/*$headers = 'From: "Nom" <'.$email_expediteur.'>'."\n"; 
	$headers .= 'Return-Path: <'.$email_reply.'>'."\n"; 
	$headers .= 'MIME-Version: 1.0'."\n"; 
	$headers .= 'Content-Type: multipart/mixed; boundary="'.$frontiere.'"';*/

	//-----------------------------------------------
	//MESSAGE HTML 
	//----------------------------------------------- 
	/*$message .= '--'.$frontiere."\n"; 

	$message .= 'Content-Type: text/html; charset="iso-8859-1"'."\n"; 
	$message .= 'Content-Transfer-Encoding: 8bit'."\n\n"; 
	$message .= $message_html."\n\n"; 

<<<<<<< .mine
	$message .= '--'.$frontiere."\n";*/


	//----------------------------------------------- 
	//PIECE JOINTE 
	//----------------------------------------------- 

	/*$message .= 'Content-Type: text/html; name="CV.pdf"'."\n"; 
	$message .= 'Content-Transfer-Encoding: base64'."\n"; 
	$message .= 'Content-Disposition:attachement; filename="CV.pdf"'."\n\n";

	$files = "C:\inetpub\wwwroot\www.KnowledgeManagement.fr\Defaut\Demo\CV.pdf";
	$message .= chunk_split(base64_encode(file_get_contents($files)))."\n"; 

	if(mail($email_expediteur,$message_texte,$message,$headers)) 
	{ 
	  echo 'Le mail a été envoyé'; 
	} 
	else 
	{ 
	  echo 'Le mail n\'a pu être envoyé'; 
	}*/
=======
	 $recup_file = $message;
     if(mail($email_expediteur,$message_texte,$message,$headers)) 
     { 
          echo 'Le mail a été envoyé'; 
     } 
     else 
     { 
          echo 'Le mail n\'a pu être envoyé'; 
     } */
	 function generateRandomString($length = 5)
	 {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	 
	$refaleatoire = generateRandomString();
	$extension = "";
	$contenu = $refaleatoire.'.'.$extension;	// R5D4D.java
	
	$chaine = '..\..\dlExemples\Developpement\\'.$extension.'\\'.$contenu;
	
	$recup_contenu = '<?php echo phpinfo(); echo "salut"?>'; $POST['exemple'];
	
	$fichier = fopen($chaine, "w+");
	
	fwrite($fichier, $recup_contenu);
	
>>>>>>> .r65
?>

