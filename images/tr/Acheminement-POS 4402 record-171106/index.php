<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Acheminement TGV POS 4402</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../ferrovia.ico" type="image/bmp" />
<link rel="stylesheet" href="diapos_gallerie.css" />

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
        //$commentaire = $iptc['2#120'][0];
        $commentaire = (isset($iptc["2#025"][0])) ? $iptc["2#025"][0] : ' '; // On prend le mot-clé pour le test
      }
      echo $commentaire;
      if($j<$i-1)echo '\',\'';
    }
    echo '\'];
    ';
?>
var prec, suiv, Grandephoto, CadrePhoto;

function AfficherGrandePhoto(num) {
prec = document.getElementById('prec-in');
suiv = document.getElementById('suiv-in');
Grandephoto = document.getElementById("Grandephoto");
CadrePhoto = document.getElementById("Photo");
document.getElementById('legende').innerHTML = Legendes[num];

Photo.src=Tableau[num];
	var numPrec = num - 1;
	var numSuiv = num + 1;
	if(num>0){
		prec.onclick = function() {AfficherGrandePhoto(numPrec)};
//		prec.innerHTML = Tableau[numPrec];
		}
	if(num<NbImages){
		suiv.onclick=function() {AfficherGrandePhoto(numSuiv)};
//		suiv.innerHTML = Tableau[numSuiv];
		}
}

function precOnmouveover() {
  prec.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
  prec.style.color = "rgba(255, 255, 255, 1)";
}

function precOnmouveout() {
  prec.style.backgroundColor = "rgba(0, 0, 0, 0)";
  prec.style.color = "rgba(255, 255, 255, 0)";
}

function suivOnmouveover() {
  suiv.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
  suiv.style.color = "rgba(255, 255, 255, 1)";
}

function suivOnmouveout() {
  suiv.style.backgroundColor = "rgba(0, 0, 0, 0)";
  suiv.style.color = "rgba(255, 255, 255, 0)";
}

Photo.onload = function(){
    var MargTop = - 10 - (Photo.height/2);
    var MargGau = - 10 - (Photo.width/2);
    prec.style.lineHeight = Photo.height + "px";
    suiv.style.lineHeight = Photo.height + "px";
    CadrePhoto.style.height = Photo.height + "px";
    CadrePhoto.style.width = Photo.width + "px";
    CadrePhoto.style.backgroundImage  = "url('" + Photo.src + "')"; 
    Grandephoto.style.marginTop  = MargTop + "px";
    Grandephoto.style.marginLeft = MargGau + "px";
    Grandephoto.style.display = 'block';
}

function FermerGrandePhoto() {
    document.getElementById('Grandephoto').style.display = 'none';
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
    echo '<div id="Grandephoto" onclick="FermerGrandePhoto();"> <div id="Photo"><div id="prec-in" onmouseover="precOnmouveover();" onmouseout="precOnmouveout();">&lt;&lt;</div>
     <div id="suiv-in" onmouseover="suivOnmouveover();" onmouseout="suivOnmouveout();">&gt;&gt;</div> </div>
     <p id="legende"></p>
    </div>
';

    //affichage de l'entête du tableau
    echo
    '<div class="gallerie">
    ';
    
    // Affichage des vignettes
    for ($j=0;$j<=$i-1;$j++)
    {
    $thumbnail_large = substr($tab_image[$j],0,-4).'_tb.jpg';
    $diapo = '<img src="'.$thumbnail_large.'" alt="'.substr($tab_image[$j],0,-4).'" />';

    echo
    '
    <div class="vignette" onclick="AfficherGrandePhoto('.$j.');"> 
    '.$diapo.' <br />
    '.substr($tab_image[$j],0,-4).' 
    </div>
    ';
    }
    echo '</div>';
     
?>
</body>
</html>