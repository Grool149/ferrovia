<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Allège postale OCEM PEz et bogies Y 24 X</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="/ferrovia.ico" type="image/bmp" />
<link rel="stylesheet" href="/diapos.css" />
<script language="JavaScript" type="text/javascript" src="/diapos.js"></script>
<script type="text/javascript">
<!--
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
    // ordre alphabétique
    sort ($tab_image);

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
/*
    '2#005'=>'DocumentTitle',
    '2#010'=>'Urgency',
    '2#015'=>'Category',
    '2#020'=>'Subcategories',
    '2#040'=>'SpecialInstructions',
    '2#055'=>'CreationDate',
    '2#080'=>'AuthorByline',
    '2#085'=>'AuthorTitle',
    '2#090'=>'City',
    '2#095'=>'State',
    '2#101'=>'Country',
    '2#103'=>'OTR',
    '2#105'=>'Headline',
    '2#110'=>'Source',
    '2#115'=>'PhotoSource',
    '2#116'=>'Copyright',
    '2#120'=>'Caption',
    '2#122'=>'CaptionWriter'
*/
//	2#005 = Object Name;
//	2#007 = Status;
//	2#022 = Job Id;
//	2#025 = keyword;
//	2#040 = Special Instruction;
//	2#065 = Program;
//	2#070 = Program version;
//	2#090 = City;
//	2#092 = Sublocation;
//	2#103 = Original transmission;
//	2#105 = Headline;
//	2#120 = Caption;
//	2#122 = Caption writer;

        //$commentaire = $iptc['2#120'][0];
//        $commentaire = (isset($iptc["2#025"][0])) ? $iptc["2#025"][0] : ' '; // On prend le mot-clé pour le test
        $commentaire = (isset($iptc["2#120"][0])) ? $iptc["2#120"][0] : ' '; // On prend le mot-clé pour le test
        $titres[$j] =  (isset($iptc["2#005"][0])) ? $iptc["2#005"][0] : ' ';
      }
      echo addslashes($commentaire);
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
  <a href="http://ferrovia.free.fr/nouveautes/index.php" class="link1">Nouveaut&eacute;s</a> | 
  <a href="http://ferrovia.free.fr/tr/index.php" class="link1">Train R&eacute;el</a> | 
  <a href="http://ferrovia.free.fr/MSTS/index.php" class="link1">Train virtuel</a> | 
  <a href="http://ferrovia.free.fr/tutoriaux/index.php" class="link1">Tutoriaux</a> | 
  <a href="http://ferrovia.free.fr/link/index.php" class="link1">Liens</a>
</div>
<p class="SectionIntroduction"><b>Z 50000 209L en livrée Ile-de-France Mobilités</b><br />
La livrée STIF/Carmillon n'est pas encore généralisée à tous les matériels ex-Transilien qu'une nouvelle livrée apparaît à l'initiative de l'autorité organisatrice des transports, c'est à dire la région Ile-de-France.
Début 2018, cette nouvelle livrée habillait les NAT 209 et 211 de Paris-St Lazare ainsi qu'un nombre croissant d'autobus du réseau Optile, alors que l'"historique" livrée Ile-de-France habille encore les premières Z 20900 et que ses dérivées
habillent l'intégralité des Z 6400 et MI2N Altéo ou Z 22500 SNCF.</p>
<?php
    echo '<div id="Grandephoto" onclick="FermerGrandePhoto();">
     <p id="legende"></p> 
     <div id="Photo">
      <div id="prec-in" onmouseover="precOnmouveover();" onmouseout="precOnmouveout();">&lt;&lt;</div>
      <div id="suiv-in" onmouseover="suivOnmouveover();" onmouseout="suivOnmouveout();">&gt;&gt;</div>
     </div> 
    </div>
';

    //affichage de l'entête du tableau
    echo
    '<div class="gallerie">
    ';
    
    // Affichage des vignettes
    for ($j=0;$j<=$i-1;$j++)
    {
    $thumbnail = substr($tab_image[$j],0,-4).'_tb.jpg';
    $thumbnail_large = substr($tab_image[$j],0,-4).'_tbl.jpg';
    $diapo = '<img src="'.$thumbnail.'" alt="'.substr($tab_image[$j],0,-4).'" onmouseover="src=\''.$thumbnail_large.'\';" onmouseout="src=\''.$thumbnail.'\';"/>';

    echo
    '
    <div class="vignette" onclick="AfficherGrandePhoto('.$j.');"> 
    '.$diapo.' <br />
    '.$titres[$j].' 
    </div>
    ';
    }
    echo '</div>';
?>
</body>
</html>