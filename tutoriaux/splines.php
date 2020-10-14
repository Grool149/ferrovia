<html>
<head>
<title>[Ferrovia] - Les splines</title>
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
      <p class="titre">Les splines</p>
      <p class="text">Les logiciels 3D offrent des moyens tr&egrave;s faciles 
        de cr&eacute;er des primitives basiques: cubes, cylindre... Dans une mod&eacute;lisation 
        plus &eacute;labor&eacute;e, ces formes simples s'av&egrave;rent rapidement 
        inapropri&eacute;es. Les techniques plus complexes comme l'extrusion prennent 
        comme &eacute;l&eacute;ments primaires des courbes 2D ou 3D: les splines.</p>
      <p class="soustitre1">Un peu de topologie</p>
      <p class="text">Les courbes dans gmax se composent de diff&eacute;rents 
        types de sous &eacute;l&eacute;ments: les vertices (singulier: vertex), 
        les segments et les splines.</p>
      <table width="75%" border="0" cellpadding="2">
        <tr class="text"> 
          <td> 
            <div align="center">Vertices</div>
          </td>
          <td> 
            <div align="center">Segments</div>
          </td>
          <td> 
            <div align="center">Splines</div>
          </td>
        </tr>
        <tr> 
          <td><img src="../images/tuts/bases/spline_1.gif" width="241" height="148" border="1"></td>
          <td><img src="../images/tuts/bases/spline_2.gif" width="241" height="148" border="1"></td>
          <td><img src="../images/tuts/bases/spline_3.gif" width="241" height="148" border="1"></td>
        </tr>
      </table>
      <p class="text"><u>Quelques Remarques</u>:</p>
      <p class="text">Les vertices ne sont pas tous du m&ecirc;me type. 
        La diff&eacute;rence tient au niveau de la tangente de la courbe au niveau 
        du vertex.</p>
      <p class="text"> Les vertices de type <b>Corner</b> ont des tangentes discontinues 
        orient&eacute;es automatiquement en fonction des vertices voisins<br>
        Les vertices de type <b>Smooth</b> ont des tangentes continues orient&eacute;es 
        automatiquement en fonction des vertices voisins<br>
        Les vertices de type <b>B&eacute;zier</b> ont des tangentes continues 
        orient&eacute;es par le dessinateur. La tangente commune est repr&eacute;sent&eacute;e 
        par deux cl&eacute;s vertes.<br>
        Les vertices de type <b>B&eacute;zier-Corner</b> ont des tangentes discontinues 
        chacune orient&eacute;e par le dessinateur. Les tangentes sont repr&eacute;sent&eacute;es 
        par deux cl&eacute;s vertes.</p>
      <table width="52%" border="0" cellpadding="2">
        <tr class="text"> 
          <td width="19%"> 
            <div align="center">Corner</div>
          </td>
          <td width="19%"> 
            <div align="center">Smooth</div>
          </td>
          <td width="15%"> 
            <div align="center">Bezier</div>
          </td>
          <td width="47%"> 
            <div align="center">Bezier-Corner</div>
          </td>
        </tr>
        <tr> 
          <td width="19%"><img src="../images/tuts/bases/spline_4.gif" width="132" height="111" border="1"></td>
          <td width="19%"><img src="../images/tuts/bases/spline_5.gif" width="132" height="111" border="1"></td>
          <td width="15%"><img src="../images/tuts/bases/spline_6.gif" width="132" height="111" border="1"></td>
          <td width="47%"><img src="../images/tuts/bases/spline_7.gif" width="132" height="111" border="1"></td>
        </tr>
      </table>
      <p class="text">Le type de chaque vertex peut &ecirc;tre modifi&eacute; 
        en le s&eacute;lectionnant et cliquant droit pour ouvrir le menu contextuel 
        (en cas de probl&egrave;me d'affichage, voir: <a href="menu-contextuel.php" class="link1">Bug 
        menu contextuel</a>)</p>
      <p class="text">Les segments sont toute portion de courbe comprise entre 
        deux vertices. Les segments peuvent &ecirc;tre courbes (leur forme sera 
        interpol&eacute;e en fonction des tangentes au niveau des vertices) ou 
        bien &ecirc;tre des segments de droite ignorant ces tangentes.</p>
      <p class="text">Le type du segment peut &ecirc;tre modifi&eacute; dans le 
        menu contextuel.</p>
      <p class="text">Les splines sont un ensemble de segments. On remarque la 
        repr&eacute;sentation particuli&egrave;re du vertex le plus &agrave; gauche 
        (figures en haut). C'est le vertex n&deg;1 de la spline. Une courbe peut 
        &ecirc;tre compos&eacute;e de plusieurs splines jointives ou non. Dans 
        le cas de splines jointives, il faut savoir que le point commun est en 
        fait constitu&eacute; de deux vertices ayant une position spatiale identique. 
        Si on fusionne les vertices, il n'y aura plus qu'une unique spline. Chaque 
        spline poss&egrave;de son vertex n&deg;1.</p>
      <p class="soustitre1">Comment dessiner une spline?</p>
      <p class="text">gmax propose dans le panneau de commande <a href="creer.php" class="link1">Create</a>, 
        et l'onglet Shapes diff&eacute;rentes fonctions pour tracer des courbes 
        particuli&egrave;res: rectangles, arc, cercles, textes... Nous allons 
        nous int&eacute;resser &agrave; la fonction <b>Line</b> qui offre un grande 
        vari&eacute;t&eacute; de cr&eacute;ation. Tout se fait &agrave; la souris. 
        On peut n&eacute;anmoins s'aider des snaps.</p>
      <p class="text">Les param&egrave;tres int&eacute;ressants par d&eacute;faut 
        sont: </p>
      <table width="75%" border="0">
        <tr>
          <td width="25%"><img src="../images/tuts/bases/spline_8.gif" width="171" height="292" border="1"></td>
          <td width="75%" valign="top" class="text"> 
            <p>La case <b>Interpolation:Steps</b> est tr&egrave;s importante en 
              mod&eacute;lisation low poly car elle d&eacute;finit le nombres 
              de points utilis&eacute;s pour discr&eacute;tiser les segments. 
              Ce qui donnera autant d'ar&ecirc;tes lorsque la courbe sera extrud&eacute;e. 
              On visera donc &agrave; utiliser le nombre le plus faible qui ne 
              nuise pas trop au rendu visuel du mod&egrave;le.</p>
            <p>Les param&egrave;tres <b>Initial Type</b> et <b>Drag Type</b> indiquent 
              de quelle fa&ccedil;on on va construire la courbe.</p>
            <p>Dans le mode par d&eacute;faut, cliquer sur la fen&ecirc;tre de 
              travail. Si vous rel&acirc;cher tout de suite le clic, le vertex 
              sera <b>Corner</b>. Sinon, d&eacute;placer la souris, rel&acirc;cher 
              le clic. Aucun nouveau vertex n'a &eacute;t&eacute; cr&eacute;e 
              mais la courbe est &quot;attir&eacute;e&quot; par cet endroit. Vous 
              avez cr&eacute;&eacute; une cl&eacute; de tangente. Le vertex est 
              de type <b>Bezier</b>.</p>
            <p>Les diff&eacute;rentes combinaisons de <b>Initial Type</b> et <b>Drag 
              Type</b> provoquent des comportements qui seraient longs &agrave; 
              expliquer. Entrainez-vous &agrave; gribouiller des courbes. C'est 
              le meilleur moyen d'apprendre. Vous pourrez toujours les r&eacute;&eacute;diter 
              par la suite.</p>
            </td>
        </tr>
      </table>
      <p class="link1">Ferrovia - 3 Mai 2003</p>
      </td>
  </tr>
</table>
</body>
</html>
