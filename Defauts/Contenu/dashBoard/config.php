<?php
/* formatage de la taille */
function formatSize($s) {
  /* unités */
  $u = array('octets','Ko','Mo','Go','To');
  /* compteur de passages dans la boucle */
  $i = 0;
  /* nombre à afficher */
  $m = 0;
  /* division par 1024 */
  while($s >= 1) {
    $m = $s;
    $s /= 1024;
    $i++;
  }
  if(!$i) $i=1;
  $d = explode(".",$m);
  /* s'il y a des décimales */
  if($d[0] != $m) {
    $m = number_format($m, 2, ",", " ");
  }
  return $m." ".$u[$i-1];
}

/* formatage du type */
function assocType($type) {
  /* tableau de conversion */
  $t = array(
    'fifo' => "file",
    'char' => "fichier spécial en mode caractère",
    'dir' => "dossier",
    'block' => "fichier spécial en mode bloc",
    'link' => "lien symbolique",
    'file' => "fichier",
    'unknown' => "inconnu"
  );
  return $t[$type];
}

/* description de l'extention */
function assocExt($ext) {
  $e = array(
    '' => "inconnu",
    'doc' => "Microsoft Word",
    'xls' => "Microsoft Excel",
    'ppt' => "Microsoft Power Point",
    'pdf' => "Adobe Acrobat",
    'zip' => "Archive WinZip",
    'txt' => "Document texte",
    'gif' => "Image GIF",
    'jpg' => "Image JPEG",
    'png' => "Image PNG",
    'php' => "Script PHP",
    'php3' => "Script PHP",
    'htm' => "Page web",
    'html' => "Page web",
    'css' => "Feuille de style",
    'js' => "JavaScript"
  );
  if(in_array($ext, array_keys($e))) {
    return $e[$ext];
  } else {
    return $e[''];
  }
}


function mfunGetPerms( $in_Perms ) { 
   $sP;

   if($in_Perms & 0x1000)     // FIFO pipe
     $sP = 'p'; 
   elseif($in_Perms & 0x2000) // Character special
     $sP = 'c'; 
   elseif($in_Perms & 0x4000) // Directory
     $sP = 'd'; 
   elseif($in_Perms & 0x6000) // Block special
     $sP = 'b';
   elseif($in_Perms & 0x8000) // Regular
     $sP = '&minus;';
   elseif($in_Perms & 0xA000) // Symbolic Link
     $sP = 'l';
   elseif($in_Perms & 0xC000) // Socket
     $sP = 's';
   else                       // UNKNOWN
     $sP = 'u'; 

   // owner
   $sP .= (($in_Perms & 0x0100) ? 'r' : '&minus;') .
          (($in_Perms & 0x0080) ? 'w' : '&minus;') . 
          (($in_Perms & 0x0040) ? (($in_Perms & 0x0800) ? 's' : 'x' ) : 
                                  (($in_Perms & 0x0800) ? 'S' : '&minus;')); 

   // group
   $sP .= (($in_Perms & 0x0020) ? 'r' : '&minus;') .
          (($in_Perms & 0x0010) ? 'w' : '&minus;') . 
          (($in_Perms & 0x0008) ? (($in_Perms & 0x0400) ? 's' : 'x' ) : 
                                  (($in_Perms & 0x0400) ? 'S' : '&minus;')); 

   // world
   $sP .= (($in_Perms & 0x0004) ? 'r' : '&minus;') .
          (($in_Perms & 0x0002) ? 'w' : '&minus;') . 
          (($in_Perms & 0x0001) ? (($in_Perms & 0x0200) ? 't' : 'x' ) : 
                                  (($in_Perms & 0x0200) ? 'T' : '&minus;')); 
   return $sP;
 }



?>