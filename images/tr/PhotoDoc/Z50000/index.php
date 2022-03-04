<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - All�ge postale OCEM PEz et bogies Y 24 X</title>
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
     
    //on les stocke les noms des fichiers des images trouv�es, dans un tableau
    while ($fichier = readdir($pointeur))
    {
      if ((substr($fichier, -3) == "jpg") && (substr($fichier, -7) !== "_tb.jpg") && (substr($fichier, -8) !== "_tbl.jpg"))
      {
        $tab_image[$i] = $fichier;
        $i++;
      }
    }
     
    //on ferme le r�pertoire
    closedir($pointeur);
    // ordre alphab�tique
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

    // collecte des l�gendes
    for ($j=0;$j<=$i-1;$j++)
    {
      $commentaire = ' ';

      // R�cup�ration des donn�es Iptc
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
//        $commentaire = (isset($iptc["2#025"][0])) ? $iptc["2#025"][0] : ' '; // On prend le mot-cl� pour le test
        $commentaire = (isset($iptc["2#120"][0])) ? $iptc["2#120"][0] : ' '; // On prend le mot-cl� pour le test
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
<p class="SectionIntroduction"><b>Z 50000 209L en livr�e Ile-de-France Mobilit�s</b><br />
La livr�e STIF/Carmillon n'est pas encore g�n�ralis�e � tous les mat�riels ex-Transilien qu'une nouvelle livr�e appara�t � l'initiative de l'autorit� organisatrice des transports, c'est � dire la r�gion Ile-de-France.
D�but 2018, cette nouvelle livr�e habillait les NAT 209 et 211 de Paris-St Lazare ainsi qu'un nombre croissant d'autobus du r�seau Optile, alors que l'"historique" livr�e Ile-de-France habille encore les premi�res Z 20900 et que ses d�riv�es
habillent l'int�gralit� des Z 6400 et MI2N Alt�o ou Z 22500 SNCF.</p>
<?php
    echo '<div id="Grandephoto" onclick="FermerGrandePhoto();">
     <p id="legende"></p> 
     <div id="Photo">
      <div id="prec-in" onmouseover="precOnmouveover();" onmouseout="precOnmouveout();">&lt;&lt;</div>
      <div id="suiv-in" onmouseover="suivOnmouveover();" onmouseout="suivOnmouveout();">&gt;&gt;</div>
     </div> 
    </div>
';

    //affichage de l'ent�te du tableau
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