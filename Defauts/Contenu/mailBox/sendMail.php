<?php
	session_start();
	include_once("../../../SQL/Fonctions_SQL/souscategorie.php");
	include_once("../../../SQL/Fonctions_SQL/categorie.php");
	include_once("../../../SQL/Fonctions_SQL/messagerie.php");
	require_once('../pclzip.lib.php');
	
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
	
	//Récupération du bon lien 
	$categorie = getCategorieById($_POST['categorie']);
	$souscategorie = getsousCategorieById($_POST['sousCategorie']);
	$link = "";
	$reference = generateRandomString();
	if(!empty($_FILES['pj']['name'])){
		$uploaddir = $_SERVER['DOCUMENT_ROOT'].'\Defauts\dlExemples\\'. utf8_decode($categorie[0]['nomCat']).'\\'.utf8_decode($souscategorie[0]['nomSousCat']).'\\';
	 
		// Création de la référence aléatoire
		$extension = explode('.',$_FILES['pj']['name']);
		
		
		// Vérifie que la référence n'existe pas	
		$sql = run("SELECT idReferenceTmp FROM m5f_tmp WHERE idReferenceTmp = '".$reference."'");
		$sql2 = run("SELECT idReference FROM m5f_document WHERE idReference = '".$reference."'");
		$ok = 1;
		while ($ok == 1)
		{
			if ($reference == $sql[0]['idReferenceTmp'] || $reference == $sql2[0]['idReference']  )
			{
				$ok = 1;
				$reference = generateRandomString();
			}else{ $ok = 0; }
		}
		$uploadfile = $uploaddir.$reference;
		$nameOrigin = $uploaddir.$_FILES['pj']['name'];
		
		// Upload le fichier sur le serveur
		move_uploaded_file($_FILES['pj']['tmp_name'], $nameOrigin);
		
		$filename = $uploadfile.'.'.$extension[1];
		$zip = new PclZip($uploadfile.'.zip');
		$zip->create($nameOrigin,PCLZIP_OPT_REMOVE_ALL_PATH);
		
		// Suppression fichier coté serveur
		unlink($nameOrigin);
		$link = utf8_decode($categorie[0]['nomCat']).'/'.utf8_decode($souscategorie[0]['nomSousCat']).'/'.utf8_decode($reference).'.zip';
	}
		
	//Mise en forme des éléments rentrés
	$exemple = "" ;
	$souscategorie[0]['nomSousCat'] = strtolower($souscategorie[0]['nomSousCat']);
	if ($souscategorie[0]['nomSousCat'] == "html")
	{
		$souscategorie[0]['nomSousCat'] = "markup";
	}
	else if ($souscategorie[0]['nomSousCat'] == "c#")
	{
		$souscategorie[0]['nomSousCat'] = "csharp";
		echo 'toto';
	}
	
	for ($i=0 ; $i<$_POST['nombre']+1 ; $i++)
	{
		$exemple .='<div class="cadreMessage">'.str_replace("'","''",htmlspecialchars($_POST['explication'.$i])).'</div></br></br>'.
					'<section class="language-'.$souscategorie[0]['nomSousCat'].'"><pre class="line-numbers" style="solid cadetblue 4px;">
					<code>'.str_replace("'","''",htmlspecialchars($_POST['exemple'.$i])).'</code></pre></section>';
	}
	$description = str_replace("'","''",htmlspecialchars($_POST['description']));
	addFunctionBddTmp(utf8_decode($reference), utf8_decode($_POST['intitule']),utf8_decode($description),$exemple,$link,$_POST['sousCategorie'],$_SESSION['id']);
	
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
	/* $recup_file = $message;
     if(mail($email_expediteur,$message_texte,$message,$headers)) 
     { 
          echo 'Le mail a été envoyé'; 
     } 
     else 
     { 
          echo 'Le mail n\'a pu être envoyé'; 
     }
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
	
	fwrite($fichier, $recup_contenu);*/
	
	//header('Location:../../../accueil.php');
?>