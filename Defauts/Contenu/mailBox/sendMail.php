<?php 
     //----------------------------------------------- 
     //DECLARE LES VARIABLES 
     //----------------------------------------------- 

     /*$email_expediteur='thomasdebas@m5f.fr'; 
     $email_reply='thomas.debas@epsi.fr'; 
     $message_texte='Bonjour,'."\n\n".'Voici un message au format texte'; 

     $message_html='<html> 
     <head> 
     <title>Titre</title> 
     </head> 
     <body>Test de message</body> 
     </html>'; */

     //----------------------------------------------- 
     //GENERE LA FRONTIERE DU MAIL ENTRE TEXTE ET HTML 
     //----------------------------------------------- 

     //$frontiere = '-----=' . md5(uniqid(mt_rand())); 

     //----------------------------------------------- 
     //HEADERS DU MAIL 
     //----------------------------------------------- 

     /*$headers = 'From: "Nom" <'.$email_expediteur.'>'."\n"; 
     $headers .= 'Return-Path: <'.$email_reply.'>'."\n"; 
     $headers .= 'MIME-Version: 1.0'."\n"; 
     $headers .= 'Content-Type: multipart/mixed; boundary="'.$frontiere.'"';*/ 

     //----------------------------------------------- 
     //MESSAGE TEXTE 
     //----------------------------------------------- 
     /*$message = 'This is a multi-part message in MIME format.'."\n\n"; 

     $message .= '--'.$frontiere."\n"; 
     $message .= 'Content-Type: text/plain; charset="iso-8859-1"'."\n"; 
     $message .= 'Content-Transfer-Encoding: 8bit'."\n\n"; 
     $message .= $message_texte."\n\n"; 
	 */
     //----------------------------------------------- 
     //MESSAGE HTML 
     //----------------------------------------------- 
    /* $message .= '--'.$frontiere."\n"; 

     $message .= 'Content-Type: text/html; charset="iso-8859-1"'."\n"; 
     $message .= 'Content-Transfer-Encoding: 8bit'."\n\n"; 
     $message .= $message_html."\n\n"; 

     $message .= '--'.$frontiere."\n"; */

	 
     //----------------------------------------------- 
     //PIECE JOINTE 
     //----------------------------------------------- 
/*
     $message .= 'Content-Type: text/html; name="R5FG47.html"'."\n"; 
     $message .= 'Content-Transfer-Encoding: base64'."\n"; 
     $message .= 'Content-Disposition:attachement; filename="R5FG47.html"'."\n\n"; 

	 //C:\inetpub\wwwroot\www.KnowledgeManagement.fr\Defauts\Contenu\mailBox
     $message .= chunk_split(base64_encode(file_get_contents('..\..\dlExemples\Categorie\sous\R5FG47.html')))."\n"; 
	 echo $message;

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
	$extension = ;
	$contenu = $refaleatoire.'.'.$extension;	// R5D4D.java
	
	$chaine = '..\..\dlExemples\Developpement\\'.$extension.'\\'.$contenu;
	
	$recup_contenu = '<?php echo phpinfo(); echo "salut"?>'; $POST['exemple']
	
	$fichier = fopen($chaine, "w+");
	
	fwrite($fichier, $recup_contenu);
	
?>

