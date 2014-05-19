<?php

include_once("../../../SQL/Fonctions_SQL/categorie.php");
include_once("../../../SQL/Fonctions_SQL/souscategorie.php");
require_once("config.php");

	function roundsize($size)
	{
	    $i=0;
	    $iec = array("B", "Ko", "Mo", "Go", "To");
	    while (($size/1024)>1)
	    {
	        $size=$size/1024;
	        $i++;
	    }
	    return(round($size,1)." ".$iec[$i]);
    }

	function getDirSize($dir_name)
	{
		$dir_size =0;
		if (is_dir($dir_name))
		{
			if ($dh = opendir($dir_name))
			{
				while (($file = readdir($dh)) !== false)
				{
					if($file !="." && $file != "..")
					{
						if(is_file($dir_name."/".$file))
						{
							$dir_size += filesize($dir_name."/".$file);
						}
						if(is_dir($dir_name."/".$file))
						{
							$dir_size +=  getDirSize($dir_name."/".$file);
						}
					}
				}
			}
			closedir($dh);
			return $dir_size;
		}
	}

	/* extraction taille totale d'un dossier,
   	et calcul du nombre de fichiers et de
   	dossiers contenus */
	function getSize($base)
	{
		global $nfile, $ndir;
		$size = 0;
		/* ouverture */
		if($dir = opendir($base))
		{
			/* listage */
			while($entry = readdir($dir))
			{
				/* protection contre boucle infini */
				if(!in_array($entry, array(".","..")))
				{
					/* cas dossier, récursion */
					if(is_dir($base."/".$entry)) 
					{
						$size += getSize($base."/".$entry);
						$ndir++;
						/* cas fichier */
					} else {
						$size += filesize($base."/".$entry);
						$nfile++;
					}
				}
			}
			/* fermeture */
			closedir($dir);
		}
		return $size;
	}

	/* dossier */
	function printDir()
	{
		$entry = "C:\inetpub\wwwroot\www.KnowledgeManagement.fr";
		global  $nfile, $ndir;

		/* extraction infos */
		$nfile = 0;
		$ndir = 0;
		$entry = rawurldecode($entry);
		$n = explode("/", $entry);
		$name = $n[count($n)-1];
		$type = assocType(filetype($entry));
		$date = date("d/m/Y H:i:s", filemtime($entry));
		$size = formatSize(getSize($entry));
		$perms = fileperms($entry);

		echo '
			<div class="list-group">
				<a class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-globe"></i>&nbsp;Site Web</a>
					<a class="list-group-item"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;Type : '.$type.'</a>
					<a class="list-group-item">&nbsp;Emplacement : '.$entry.'</a>
					<a class="list-group-item">&nbsp;Taille : '.$size.'</a>
					<a class="list-group-item">&nbsp;Contenu : '.$nfile.' fichiers '.$ndir.' dossiers </a>
					<a class="list-group-item">&nbsp;Créé le : dimanche 22 décembre 2013, 23:22:51 </a>
					<a class="list-group-item">&nbsp;Dernière modification : '.$date.'</a>
			</div>
		<?php ';
	 }
?>



<div class="list-group">
	<a class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-hdd"></i>&nbsp;Disque dur</a>
		<a class="list-group-item">Total : <?php $dd_total = disk_total_space("\\"); echo roundsize($dd_total)." ( ".$dd_total. " octets )"; ?></a>
		<a class="list-group-item">Libre : <?php $df_libre = disk_free_space("\\"); echo roundsize($df_libre)." ( ".$df_libre. " octets )"; ?></a>
		<a class="list-group-item">Application : <?php $dir_name = "C:\inetpub\wwwroot\www.KnowledgeManagement.fr"; $total_size = round((getDirSize($dir_name) / 1048576),2) ; $total = $total_size * 1048576; echo $total_size." MB ( ".$total." octets )"; ?></a>
</div>

<div>
<?php printDir(); ?>
</div>

<div class="list-group">
	<a class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-hand-right"></i>&nbsp;Catégorie(s)</a>
	<a class="list-group-item">Nombres de catégorie(s) : <?php echo countAllCategorie(); ?></a>
</div>

<div class="list-group">
	<a class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-hand-right"></i>&nbsp;Sous-catégorie(s)</a>
	<a class="list-group-item">Nombres total de sous-catégorie(s) : <?php echo countAllSousCategorie(); ?></a>
	<?php 	
		for($j = 1; $j <= countAllCategorie();$j++)
		{
			?>
		<a class="list-group-item">Nombres de sous-catégorie dans la catégorie &nbsp;<?php echo nameByCateg(4 + $j); ?> :&nbsp;<?php echo countsousCategByCateg(4 + $j); ?></a>
			<?php
		} 
	?>
</div>

<div class="list-group">
	<a class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-hand-right"></i>&nbsp;Fonction(s)</a>
	<a class="list-group-item">Nombres total de fonction(s) :&nbsp;<?php echo countAllFunctions(); ?></a>
	<?php	
		for($i = 1; $i <= functionBySousCateg();$i++)
		{
			//echo countFunctionBySousCateg(1);
			if($i!=2 && $i!=9){
			?>
			<a class="list-group-item">Nombres de fonctions dans la sous-catégorie &nbsp;<?php echo nameBySousCateg(13 + $i); ?> :&nbsp;<?php echo countFunctionBySousCateg(13+$i); ?></a>
			<?php
			}
		}
	?>
</div>