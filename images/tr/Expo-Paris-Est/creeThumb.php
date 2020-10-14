<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Test gallerie photo automatique</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../ferrovia.ico" type="image/bmp" />
<link rel="stylesheet" href="diapos_absolute.css" />

<script type="text/javascript">
<!--
var Photo =new Image;
<?php
    //on ouvre le repertoire
    $pointeur = opendir('.');
    $i = 0;
     
    //on les stocke les noms des fichiers des images trouvées, dans un tableau
    while ($fichier = readdir($pointeur))
    {
    if ((substr($fichier, -3) == "jpg") && (substr($fichier, -7) !== "_tb.jpg"))
    {
    $tab_image[$i] = $fichier;
    $i++;
    }
    }
     
    //on ferme le répertoire
    closedir($pointeur);

    echo 'var NbImages = '.($i - 1).';
var Tableau = [\'';

    //affichage des images
    for ($j=0;$j<=$i-1;$j++)
    {
    $thumbnail = substr($tab_image[$j],0,-4).'_tb.jpg';

    // Création des vignettes si elles n'existent pas.
    if (file_exists($thumbnail) == FALSE) {
    $source = imagecreatefromjpeg($tab_image[$j]);
    // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
    $largeur_source = imagesx($source);
    $hauteur_source = imagesy($source);

    // Mode paysage
    if($largeur_source > $hauteur_source){
        $largeur_destination = 400;
        $hauteur_destination = $hauteur_source * $largeur_destination / $largeur_source;
    }
    // Mode portrait
    else {
        $hauteur_destination = 400;
        $largeur_destination = $hauteur_destination * $largeur_source / $hauteur_source;
    }
    $destination = imagecreatetruecolor($largeur_destination, $hauteur_destination); //image miniature vide crée

    // On crée la miniature
    imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

    // On enregistre la miniature
    imagejpeg($destination, $thumbnail);
    }

    echo $tab_image[$j];
    if($j<$i-1)echo '\',\'';
    }
    echo '\'];
';
?>
//-->
</script>

</head>

<body>

<div id="header1">
  <div id="header0"></div>
</div>
<div id="header2">
</div>
</body>
</html>