<html>
<head>
<title>[Ferrovia] - L'ombrage de Gouraud</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style.css">
</head>
<?php

$id = "no";

include("../php/include.txt");
?> 
<table width="1000" border="0" cellpadding="20">
  <tr>
    <td class="soustitre1"> 
      <p><span class="titre">L'ombrage de Gouraud</span></p>
      <span class="text"> 
      <p>Pour repr&eacute;senter un objet 3D &agrave; l'&eacute;cran, un ordinateur 
        va calculer la position des sommets qui le composent puis va remplir les 
        triangles qui relient ces sommets. Pour cela, il prendra en compte la 
        couleur de l'objet (couleur diffuse ou texture appliqu&eacute;e sur l'objet). 
        Cependant, le rendu de l'objet sera tr&egrave;s plat.</p>
      <p>Exemple, une th&eacute;i&egrave;re de couleur uniforme grise. Tous les 
        points ont la m&ecirc;me couleur, il n'y a aucun effet de 3D.</p>
      <p><img src="../images/tuts/bases/gouraud_01.jpg" width="529" height="342" border="1"></p>
      <p>En ajoutant un ombrage, les volumes apparaissent tout de suite.</p>
      <p><img src="../images/tuts/bases/gouraud_02.jpg" width="529" height="342" border="1"></p>
      <p>L'ombrage de Gouraud est un algorithme qui se base sur la lumi&egrave;re 
        incidente. Une source de lumi&egrave;re est d&eacute;finie (Dans le cas 
        de MSTS, c'est tout simplement le soleil), l'angle entre la lumi&egrave;re 
        et la normale de chaque polygone permet de calculer le taux de lumi&egrave;re 
        r&eacute;fl&eacute;chie en direction de la cam&eacute;ra. Ce taux va pond&eacute;rer 
        la couleur de base de la th&eacute;i&egrave;re. Le gris uniforme sera 
        alors &eacute;clairci ou fonc&eacute;.</p>
      </span><span class="text"> 
      <p class="link1">Ferrovia - 15 Octobre 2005</p>
      </span></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
