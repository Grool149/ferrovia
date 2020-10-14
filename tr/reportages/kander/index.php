<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Rampe nord de la ligne du L�tschberg</title>
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
        //$commentaire = $iptc['2#120'][0];
//        $commentaire = (isset($iptc["2#025"][0])) ? $iptc["2#025"][0] : ' '; // On prend le mot-cl� pour le test
        $commentaire = (isset($iptc["2#120"][0])) ? $iptc["2#120"][0] : ' '; // On prend le mot-cl� pour le test
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
  Grandephoto.style.width = largeur_Photo + "px";
}

function FermerGrandePhoto() {
    document.getElementById('Grandephoto').style.display = 'none';
}

//Affecte la nouvelle image lorsque la souris survole l'�l�ment
function passageDeLaSouris(element, num) {
element.setAttribute('src', substr(Tableau[num],0,-4) & '_tbl.jpg');
}
//Affecte l'image de d�part lorsque la souris ne survole plus l'�l�ment
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
<p class="SectionIntroduction"><b>L�tschberg : la vall�e de la Kander (Mai-Juin 2007)</b><br />
La ligne du L�tschberg traverse les alpes Suisses du nord au sud. Elle permet, par un tunnel de fa�te de 14,6 km, de relier directement Berne (et au-del�, B�le et la vall�e du Rhin) � Brigue, 
dans la haute vall�e du Rh�ne, d'o� part le tunnel du Simplon vers l'Italie. 
Il s'agit donc d'un axe important de communication Europ�en, qui voyait la mise en oeuvre de moyens de traction lourds pour franchir de fortes d�clivit�s.<br />
Cette ligne a �t� construite, et est toujours exploit�e, par une compagnie priv�e, le BLS (Berne-L�tschberg-Simplon).<br />
<br />
Cette s�rie de photos fut prise peu avant la mise en service du tunnel de base qui a depuis chass� les trains de marchandises les plus lourds et les express les plus rapides de cette 
tr�s belle ligne de montagne.
Sur le versant nord, entre Fr�tigen et Kandersteg, la ligne se hisse dans la vall�e �troite de la Kander. Elle franchit de nombreux tunnels et viaducs et parcourt deux boucles 
sur les communes de Blausee et Mitholz. Moins c�l�bres que celles de Wassen de la ligne du Saint-Gothard, elles n'en sont pas moins impressionnantes en faisant prendre aux trains 
pr�s de 200 m�tres d'altitude, et comportent un tunnel h�lico�dal.<br />
<br />
Contrairement au Saint-Gothard, le L�tschberg n'est pas doubl� d'un axe routier important. Le col de haute-montagne du Grimsel n'�tant ouvert que six mois dans l'ann�e, 
les automobilistes sont contraints de contourner l'Oberland Bernois par le lac L�man ou par le Saint-Gothard. Mais le plus rapide reste d'emprunter la navette porte-autos du BLS entre 
Kandersteg et Goppenstein (voire m�me Iselle de l'autre c�t� du Simplon).</p>
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
    '.substr($tab_image[$j],0,-4).' 
    </div>
    ';
    }
    echo '</div>';
?>
</body>
</html>