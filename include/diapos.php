<?php
    //on ouvre le repertoire
    $pointeur = opendir('.');
    $i = 0;
     
    //on les stocke les noms des fichiers des images trouvées, dans un tableau
    while ($fichier = readdir($pointeur))
    {
      if ((substr($fichier, -3) == "jpg") && (substr($fichier, -7) !== "_tb.jpg") && (substr($fichier, -8) !== "_tbl.jpg"))
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
      echo $tab_image[$j];
      if($j<$i-1)echo '\',\'';
    }
    echo '\'];
    ';
    echo 'var Legendes = [\'';

    // collecte des légendes
    for ($j=0;$j<=$i-1;$j++)
    {
      $commentaire = ' ';

      // Récupération des données Iptc
      GetImageSize ($tab_image[$j],$info);
      if (isset($info["APP13"]))
      {
        $iptc = iptcparse ($info["APP13"]);
        $commentaire = (isset($iptc["2#120"][0])) ? $iptc["2#120"][0] : ' '; // Champ IPTC 'Caption'
      }
      echo addslashes($commentaire);
      if($j<$i-1)echo '\',\'';
    }
    echo '\'];
    ';
?>