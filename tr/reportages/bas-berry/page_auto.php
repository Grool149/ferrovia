<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - La BB 667624 et la nouvelle livr&eacute;e Infra</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../ferrovia.ico" type="image/bmp" />
<link rel="stylesheet" href="../../../diapos.css" />

<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

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

<body onload="MM_preloadImages()">

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
<p class="SectionIntroduction">La BB 667624 et la nouvelle livr&eacute;e Infra</p>
<?php
    //affichage de l'ent�te du tableau
    echo
    '<div id="gallerie">
    ';
     
    //nom du r�pertoire contenant les images � afficher
    $nom_repertoire = 'thumbnails';
     
    //on ouvre le repertoire
    $pointeur = opendir($nom_repertoire);
    $i = 0;
     
    //on les stocke les noms des fichiers des images trouv�es, dans un tableau
    while ($fichier = readdir($pointeur))
    {
    if (substr($fichier, -3) == "jpg")
    {
    $tab_image[$i] = $fichier;
    $i++;
    }
    }
     
    //on ferme le r�pertoire
    closedir($pointeur);
     
    //on trie le tableau par ordre alphab�tique
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