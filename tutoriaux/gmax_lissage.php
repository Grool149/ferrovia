<html>
<head>
<title>[Ferrovia] - Le lissage des ar&ecirc;tes</title>
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
      <p><span class="titre">Le lissage des ar&ecirc;tes</span></p>
      <span class="text"> 
      <p>Les surfaces d'un objet 3D sont compos&eacute;es de triangles jointifs. 
        Si ces triangles ne sont pas dans un plan unique, les ar&ecirc;tes qui 
        les s&eacute;parent deviennent visibles. La cause en revient &agrave; 
        l'<a href="gouraud.php" class="link1">ombrage de Gouraud</a> qui calcule 
        la lumi&egrave;re r&eacute;fl&eacute;chie par chaque polygone par rapport 
        &agrave; une source de lumi&egrave;re.</p>
      <p>Voici un objet compos&eacute; de quatres faces quadrangulaires. Les ar&ecirc;tes 
        sont visibles bien que l'ensemble de l'objet ait une couleur uniforme.</p>
      <p><img src="../images/tuts/bases/smoothing_02.gif" width="497" height="357" border="1"></p>
      <p>C'est parce que les sommets pr&eacute;sentent plusieurs normales diff&eacute;rentes. 
        Puisque l'ombrage de Gouraud d&eacute;pend de l'angle entre les directions 
        de la lumi&egrave;re incidente et la normale, on obtient des couleurs 
        diff&eacute;rentes sur chaque polygone.</p>
      <p><img src="../images/tuts/bases/smoothing_03.gif" width="497" height="357" border="1"></p>
      <p>Lisser une ar&ecirc;te revient &agrave; associer les polygones jointifs 
        pour qu'une seule normale soit calcul&eacute;e en chaque point. La couleur 
        calcul&eacute;e de part et d'autre de l'ar&ecirc;te sera la m&ecirc;me, 
        et, par simple illusion d'optique, l'ar&ecirc;te s'effacera. Gmax propose 
        32 <b>Smoothing Groups</b> pour associer les polygones.</p>
      <p><img src="../images/tuts/bases/smoothing_01.gif" width="167" height="279" border="1"></p>
      <p>Apr&egrave;s un <b>Edit Mesh</b> qui nous permet de s&eacute;lectionner 
        polygone par polygone, on s&eacute;lectionne le premier et, dans la section 
        <b>Surface properties</b>, on l'affecte au <b>Smoothing Group</b> 1.</p>
      <p><span class="text"><img src="../images/tuts/bases/smoothing_04.gif" width="497" height="357" border="1"> 
        <img src="../images/tuts/bases/smoothing_05.gif" width="156" height="100" border="1"> 
        </span></p>
      </span>
      <p></p>
      <span class="text"> 
      <p>On s&eacute;lectionne la seconde facette et on l'affecte aux <b>Smoothing 
        Groups</b> 1 et 2.</p>
      <p><img src="../images/tuts/bases/smoothing_06.gif" width="497" height="357" border="1"> 
        <img src="../images/tuts/bases/smoothing_07.gif" width="156" height="100" border="1"></p>
      <p>Puisque les deux facettes sont dans le groupe 1, Gmax efface l'ar&ecirc;te 
        qui les s&eacute;pare.</p>
      <p><img src="../images/tuts/bases/smoothing_08.gif" width="497" height="357" border="1"></p>
      <p>De m&ecirc;me, on s&eacute;lectionne la troisi&egrave;me facette et on 
        l'affecte aux <b>Smoothing Groups</b> 2 et 3.</p>
      <p><img src="../images/tuts/bases/smoothing_09.gif" width="497" height="357" border="1"> 
        <img src="../images/tuts/bases/smoothing_10.gif" width="156" height="100" border="1"></p>
      <p><img src="../images/tuts/bases/smoothing_11.gif" width="497" height="357" border="1"> 
      </p>
      <p>Enfin, on s&eacute;lectionne la quatri&egrave;me facette et on l'affecte 
        au <b>Smoothing Group</b> 3.</p>
      </span>
      <p><span class="text"><img src="../images/tuts/bases/smoothing_12.gif" width="497" height="357" border="1"> 
        <img src="../images/tuts/bases/smoothing_13.gif" width="156" height="100" border="1"></span></p>
      <p><img src="../images/tuts/bases/smoothing_14.gif" width="497" height="357" border="1"></p>
      <span class="text"> 
      <p>Si on affiche &agrave; nouveau les normales des points, elles ont toutes 
        &eacute;t&eacute; unifi&eacute;es &agrave; l'exception du point entre 
        les premi&egrave;re et quatri&egrave;me facettes qui n'ont pas de <b>Smoothing 
        Group</b> en commun. C'est pourquoi l'ar&ecirc;te reste visible.</p>
      <p><img src="../images/tuts/bases/smoothing_15.gif" width="497" height="357" border="1"></p>
      <p class="link1">Ferrovia - 15 Octobre 2005</p>
      </span></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
