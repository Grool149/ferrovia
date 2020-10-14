<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Test gallerie photo automatique</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../ferrovia.ico" type="image/bmp" />
<link rel="stylesheet" href="diapos.css" />

<script type="text/javascript">
<!--
function ouvrirFermerImage(div) {
        var divContenu = div.getElementsByTagName('img')[0];
        if(divContenu.style.display == 'none') {
            divContenu.style.display = 'block';
        } else {
            divContenu.style.display = 'none';
        }
}

//-->
</script>

</head>

<body>

<div id="header1">
  <div id="header0"></div>
</div>
<div id="header2">
  <a href="http://ferrovia.free.fr/nouveautes/index.php" class="link1">Nouveaut&eacute;s</a> | 
  <a href="http://ferrovia.free.fr/tr/index.php" class="link1">Train R&eacute;el</a> | 
  <a href="http://ferrovia.free.fr/MSTS/index.php" class="link1">Train virtuel</a> | 
  <a href="http://ferrovia.free.fr/tutoriaux/index.php" class="link1">Tutoriaux</a> | 
  <a href="http://ferrovia.free.fr/link/index.php" class="link1">Liens</a>
</div>
<p class="SectionIntroduction">Test d'affichage d'une gallerie automatiquement</p>
<?php
    //affichage de l'entête du tableau
    echo
    '<div id="gallerie">
    ';
     
    //nom du répertoire contenant les images à afficher
    $nom_repertoire = 'thumbnails';
     
    //on ouvre le repertoire
    $pointeur = opendir($nom_repertoire);
    $i = 0;
     
    //on les stocke les noms des fichiers des images trouvées, dans un tableau
    while ($fichier = readdir($pointeur))
    {
    if (substr($fichier, -3) == "jpg")
    {
    $tab_image[$i] = $fichier;
    $i++;
    }
    }
     
    //on ferme le répertoire
    closedir($pointeur);
     
    //on trie le tableau par ordre alphabétique
//    array_multisort($tab_image, SORT_ASC);
     
    //affichage des images
    for ($j=0;$j<=$i-1;$j++)
    {
    $diapo = '<img src="'.$nom_repertoire.'/'.$tab_image[$j].'" alt="'.substr($tab_image[$j],0,-4).'" />';
    $image = '<img class="grand" src="images/'.$tab_image[$j].'" alt="'.substr($tab_image[$j],0,-4).'" />';
     
    echo
    '
    <div class="vignette" onclick="ouvrirFermerImage(this);"> 
    '.$image.' '.$diapo.' <br />
    '.substr($tab_image[$j],0,-4).' 
    </div>
    ';
    }
    echo '</div>';
     
?>
</body>
</html>