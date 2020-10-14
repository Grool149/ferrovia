<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - La CC 6570 dans les Causses</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../ferrovia.ico" type="image/bmp" />
<link rel="stylesheet" href="http://ferrovia.free.fr/diapos.css" />

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
//        $commentaire = (isset($iptc["2#025"][0])) ? $iptc["2#025"][0] : ' '; // On prend le mot-clé pour le test
        $commentaire = (isset($iptc["2#120"][0])) ? $iptc["2#120"][0] : ' '; // On prend le mot-clé pour le test
      }
      echo addslashes($commentaire);
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
    prec.style.display = 'block';
  }
  else{
    prec.style.display = 'none';
  }
  if(num<NbImages){
    suiv.onclick=function() {AfficherGrandePhoto(numSuiv)};
    suiv.style.display = 'block';
  }
  else{
    suiv.style.display = 'none';
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
  var largeur_Photo = (Photo.width);
  var hauteur_Photo = (Photo.height);
  var larg = (document.body.clientWidth);
  var haut = (window.innerHeight);
  if(haut<hauteur_Photo){
    hauteur_Photo=haut;
    largeur_Photo=hauteur_Photo*Photo.width/Photo.height;
  }  
  if(larg<largeur_Photo){
    largeur_Photo=larg;
    hauteur_Photo=largeur_Photo*Photo.height/Photo.width;
  }
  var MargTop = - 10 - (hauteur_Photo/2);
  var MargGau = - 10 - (largeur_Photo/2);
  prec.style.lineHeight = hauteur_Photo + "px";
  suiv.style.lineHeight = hauteur_Photo + "px";
  CadrePhoto.style.height = hauteur_Photo + "px";
  CadrePhoto.style.width = largeur_Photo + "px";
  CadrePhoto.style.backgroundImage  = "url('" + Photo.src + "')"; 
  Grandephoto.style.marginTop  = MargTop + "px";
  Grandephoto.style.marginLeft = MargGau + "px";
  Grandephoto.style.display = 'block';
}

function FermerGrandePhoto() {
    document.getElementById('Grandephoto').style.display = 'none';
}

//Affecte la nouvelle image lorsque la souris survole l'élément
function passageDeLaSouris(element, num) {
element.setAttribute('src', substr(Tableau[num],0,-4) & '_tbl.jpg');
}
//Affecte l'image de départ lorsque la souris ne survole plus l'élément
function departDeLaSouris(element, num) {
element.setAttribute('src', substr(Tableau[num],0,-4) & '_tb.jpg');
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
<p class="SectionIntroduction"><b>16-17 Mai 2009 - La CC 6570 joue au croquet</b><br />
L'<a href="http://pagesperso-orange.fr/apcc6570/" class="link1">APCC 6570</a>, association qui pr&eacute;serve la CC 6570 en Avignon, a r&eacute;ussi &agrave; 
cr&eacute;er l'&eacute;v&egrave;nement ferroviaire du printemps 2009. Convaincre la SNCF de laisser monter une CC 6500 jusqu'&agrave; St Ch&eacute;ly d'Apcher 
par la ligne des Causses. Cette ligne qui traverse le massif central fut tr&egrave;s t&ocirc;t &eacute;lectrifi&eacute;e par la Compagnie du Midi en raison de 
son profil tr&egrave;s difficile. Aujourd'hui, la ligne n'assure plus qu'un trafic r&eacute;gional et l'infrastructure est tr&egrave;s fragile, tant au niveau 
de la voie (rails &agrave; double champignon, entretien minimaliste) que de la cat&eacute;naire &quot;dans son jus&quot; d'avant guerre et des sous-stations 
dont de nombreuses hors-service. Faire gravir une CC de 118 tonnes tr&egrave;s gourmande en courant &agrave; la moindre mise en vitesse sous les ogives du Midi
&eacute;tait un &eacute;v&egrave;nement os&eacute;, in&eacute;dit et qui restera probablement unique.<br />
<br />
Cerise sur le g&acirc;teau, la m&eacute;t&eacute;o &eacute;tait au beau fixe.</p>
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
    '.substr($tab_image[$j],0,-4).' 
    </div>
    ';
    }
    echo '</div>';
?>
</body>
</html>