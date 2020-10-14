<html>
<head>
<title>[Ferrovia] - Mod&eacute;lisation d'un b&acirc;ch&eacute; kils</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style.css">
</head>
<?php

$id = "no";

include("../php/include.txt");
?> 
<table width="1000" border="0" cellpadding="20">
  <tr>
    <td> 
      <p><span class="titre">Mod&eacute;lisation d'un b&acirc;ch&eacute; kils<font size="-1"> 
        (1ere partie)</font></span></p>
      <p class="text">Ce tutorial montre les techniques de mod&eacute;lisation LPM (Low Polys Modelisation) pour r&eacute;aliser un wagon kils. Il aborde aussi l'extrusion. Technique essentielle &agrave; conna&icirc;tre pour ne pas de borner &agrave; dessiner des cubes.</p>
      <p class="soustitre1">Les splines de bases</p>
      <span class="text"> 
      <p>Nous allons commencer par la b&acirc;che. Elle sera r&eacute;alis&eacute;e 
        par extrusion. L'extrusion (Loft en anglais) requiert deux splines: le 
        forme &agrave; extruder (shape) et le chemin d'extrusion (path). Pour 
        avoir davantage de renseignements sur les splines, voir le <a href="splines.php" class="link1">tutoriel</a> 
        qui y est consacr&eacute;.</p>
      <p>Avant de se mettre &agrave; la cr&eacute;ation, nous allons r&eacute;gler 
        la grille et l'aimantation du curseur de souris ( cf: tutoriel sur les 
        <a href="gmax_snaps.php" class="link1">snaps</a>). Cliquer droit sur les 
        boutons de snap. Dans l'onglet <b>Snaps</b>, cocher uniquement <b>Grid 
        Points</b>. Dans l'onglet <b>Home Grid</b>, r&eacute;gler <b>Grid Spacing</b> 
        à 0,5.</p>
      <p>Cliquer sur la vue <b>Front</b> et l'&eacute;tendre avec <b>Min/Max Toggle</b> 
        <img src="../images/tuts/mn-mxtoggle.gif" align="absmiddle" border="1">. 
        Zoomer avec le bouton <b>Region Zoom</b> autour du point (0,0) tel que 
        l'&eacute;cran fasse environ 5 m&egrave;tres de haut.</p>
      <p> Dans le panneau de commande <b>Create</b> <img src="../images/tuts/creer.gif" align="absmiddle" border="1">, 
        en mode <b>Shape </b><img src="../images/tuts/shapes.gif" align="absmiddle" border="1">, 
        cliquer sur <b>Line</b>. Pointer sur le point (-1,5; 1)</p>
      <img src="../images/tuts/creation/kils01.gif" border="1" width="267" height="295"> 
      <p> Cliquer, rel&acirc;cher puis pointer au point (-1,5; 3).</p>
      <img src="../images/tuts/creation/kils02.gif" border="1" width="275" height="294"> 
      <p> Cliquer sans rel&acirc;cher puis pointer au point (-1,5; 4).</p>
      <img src="../images/tuts/creation/kils03.gif" border="1" width="280" height="330"> 
      <p> Rel&acirc;cher puis pointer au point (0; 4).</p>
      <img src="../images/tuts/creation/kils04.gif" border="1" width="251" height="332"> 
      <p> Cliquer sans rel&acirc;cher, d&eacute;placer la souris puis revenir 
        au point (0; 4), rel&acirc;cher. Enfin cliquer droit.</p>
      <img src="../images/tuts/creation/kils05.gif" border="1" width="217" height="293"> 
      <p> Le chemin d'extrusion est fini. Appuyer sur T (vue de dessus). A partir 
        du point (-1,5; 0), on va dessiner une ligne avec 15 points, un tous les 
        0,5m, dessinés par simple clic.</p>
      <img src="../images/tuts/creation/kils06.gif" border="1" width="158" height="409"> 
      <p> Dans le panneau de commande <b>Modify </b><img src="../images/tuts/modif.gif" align="absmiddle" border="1">, 
        Appuyer sur le bouton <b>Vertex </b><b><img src="../images/tuts/vertex.gif" border="1" align="absmiddle" width="24" height="24"></b> 
        et s&eacute;lectionner le dernier point. Enclencher le mode Translation 
        (<b>Select and Move</b>) <img src="../images/tuts/sel&move.gif" align="absmiddle" border="1"> 
        puis contraindre l'axe Y. D&eacute;v&eacute;rouiller le <b>Snap 3D</b> 
        et d&eacute;caler le point vers le haut comme sur la figure suivante.</p>
      <p><img src="../images/tuts/creation/kils07.gif" border="1" width="177" height="153"> 
      </p>
      <p>A pr&eacute;sent, s&eacute;lectionner un point sur deux et contraindre 
        l'axe X. Les d&eacute;placer l&eacute;g&egrave;rement vers la droite comme 
        sur la figure suivante.</p>
      <img src="../images/tuts/creation/kils08.gif" border="1" width="128" height="413"> 
      <p>Il faut d&eacute;placer le point de pivot de la spline pour qu'il se 
        trouve sur le chemin d'extrusion. Dans le panneau de commande <b>Hierarchy 
        </b><img src="../images/tuts/hierarchy.gif" align="absmiddle" border="1">, 
        cliquer sur <b>Affect Pivot Only</b>, cliquer sur le bouton <b>Align </b><img src="../images/tuts/align.gif" align="absmiddle" border="1">. 
        Aligner le pivot par rapport à la spline en param&eacute;trant <b>Pivot 
        Point</b> pour <b>Current Object</b>, <b>Minimum</b> pour <b>Target Object</b> 
        et en cochant les axes X et Y.</p>
      <img src="../images/tuts/creation/kils09.gif" border="1" width="121" height="397"> 
      <p>La forme est finie.</p>
      </span> 
      <p class="soustitre1">L'extrusion</p>
 	  <span class="text"> 
      <p>Nous devons faire l'extrusion maintenant. S&eacute;lectionner la premi&egrave;re 
        spline. Dans le panneau de commande <b>Create </b><img src="../images/tuts/creer.gif" align="absmiddle" border="1">, 
        en mode <b>Geometry </b><img src="../images/tuts/geometry.gif" align="absmiddle" border="1" width="24" height="26"> 
        positionner la combobox sur <b>Compound Objects</b> puis cliquer sur <b>Loft</b>. 
        Puisque cette spline est le path, nous devons s&eacute;lectionner la spline 
        qui sera la shape. Cliquer sur <b>Get Shape</b></p>
      <img src="../images/tuts/creation/kils10.gif" border="1" width="236" height="250"> 
      <p>L'objet obtenu ne correspond pas exactement &agrave; l'objet d&eacute;sir&eacute;. 
        La shape a subi une rotation ind&eacute;sirable et la face visible des 
        polygones se trouve du mauvais c&ocirc;t&eacute;. Dans le panneau de commande 
        <b>Modify </b><img src="../images/tuts/modif.gif" align="absmiddle" border="1"> 
        , d&eacute;velopper la croix <b>Loft</b> et cliquer sur <b>Shape</b>. 
        S&eacute;lectionner la shape, cliquer sur les boutons <b>Select and Rotate 
        </b> puis <b>Angle Snap</b>. Tourner la shape de 180° autour de l'axe 
        Y. Cliquer sur <b>Loft</b> dans le panneau de commande. D&eacute;velopper 
        le menu <b>Skin Parameters</b> et cocher <b>Flip Normals</b>. Les polygones 
        sont d&eacute;sormais du bon c&ocirc;t&eacute; mais il y en a beaucoup 
        trop. Dans le m&ecirc;me menu, r&eacute;gler <b>Shape Steps</b> et <b>Path 
        Steps</b> respectivement &agrave; 0 et 3. C'est largement suffissant pour 
        de la 3D temps r&eacute;el.</p>
      <img src="../images/tuts/creation/kils11.gif" border="1" width="253" height="280"> 
      <p>Il est encore possible de supprimer des facettes inutiles. Dans le panneau 
        de commandes <b>Modify</b> <img src="../images/tuts/modif.gif" align="absmiddle" border="1">, 
        d&eacute;rouler la liste des modificateurs et cliquer sur <b>Edit Mesh</b>. 
        Cliquer sur l'ic&ocirc;ne <b>Vertex </b><img src="../images/tuts/vertex.gif" align="absmiddle" border="1">. 
        S&eacute;lectionner les vertices comme sur la figure suivante. Les supprimer.</p>
      <img src="../images/tuts/creation/kils12.gif" border="1" width="199" height="158"> 
      <p>S&eacute;lectionner les pixels au-dessus. Activer le <b>Snap 3D</b> en 
        cochant Vertex. En mode <b>Select and Move</b>, tirer les vertices vers 
        ceux du bas. Avec le snap, ils se placeront exactement &agrave; la m&ecirc;me 
        position. On supprimera le points inutiles plus tard.</p>
      <img src="../images/tuts/creation/kils13.gif" border="1" width="231" height="249"> 
      <p>S&eacute;lectionner les points d&eacute;cal&eacute;s &agrave; la base 
        de la b&acirc;che. Avec la fonction <b>Align</b>, les aligner suivant 
        l'axe <b>X</b> au <b>minimum</b>.</p>
      <p><img src="../images/tuts/creation/kils14.gif" border="1" width="239" height="295"></p>
      <p>Cliquer sur l'ic&ocirc;ne <b>Polygon</b> <img src="../images/tuts/polygon.gif" align="absmiddle" border="1">. 
        S&eacute;lectionner les facettes comme sur la figure suivante. R&eacute;gler 
        le <b>groupe de lissage</b> comme sur la figure d'apr&egrave;s.</p>
      <p><img src="../images/tuts/creation/kils15.gif" border="1" align="absmiddle" width="347" height="222"> 
        <img src="../images/tuts/creation/kils16.gif" align="absmiddle" border="1" width="154" height="147"></p>
      <p>S&eacute;lectionner ensuite les autres facettes et r&eacute;gler le groupe 
        de lissage &agrave; 3.</p>
      <p>Voici le r&eacute;sultats pour cette premi&egrave;re partie du tutorial 
        pour r&eacute;aliser un kils.</p>
      <p><img src="../images/tuts/creation/kils17.jpg" border="1" width="388" height="372"></p>
      <p><a href="bache2.php" class="link1">Suite</a></p>
      <p class="link1">Ferrovia - 23 Juin 2003</p>
      </span> </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
