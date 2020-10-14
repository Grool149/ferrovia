<html>
<head>
<title>[Ferrovia] - pile des modificateurs</title>
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
      <p><span class="titre">La pile des modificateurs</span></p>
      <span class="text"> 
      <p>Les outils de CAO s'articulent autour de deux m&eacute;thodes de repr&eacute;sentation 
        des objets : le CSG (<i>Constructive Solid Geometry</i>) et le B-rep (<i>Boundary 
        Representation</i>). La premi&egrave;re est une liste d'op&eacute;rations 
        s&eacute;quentielles qui permettent d'aboutir &agrave; la forme g&eacute;om&eacute;trique 
        exacte de l'objet que l'on mod&eacute;lise. La seconde, plus pratique, 
        est une repr&eacute;sentation par un nuage de points dans l'espace. Cependant 
        le B-rep est une approximation de la forme th&eacute;orique d&eacute;finie 
        par le CSG. Les outils de CAO, soucieux de la pr&eacute;cision, r&eacute;alisent 
        donc la conversion CSG -&gt; B-rep au dernier moment. Par cons&eacute;quent, 
        ils traitent beaucoup de calculs math&eacute;matiques assez complexes.</p>
      <p>Les logiciels d'imagerie tels 3DS Max ou gmax n'ont pas les m&ecirc;mes 
        contraintes de pr&eacute;cision et, pour acc&eacute;l&eacute;rer sensiblement 
        les calculs, utilisent une m&eacute;thode alternative. gmax construit 
        les objets selon la m&eacute;thode CSG en empilant des modificateurs qui 
        construisent &eacute;tape par &eacute;tape l'objet d&eacute;finitif. Cependant, 
        d&egrave;s la toute premi&egrave;re &eacute;tape qui est la cr&eacute;ation 
        d'une forme basique (la primitive), l'objet est sous forme de B-rep.</p>
      <p class="soustitre1">La pile de construction d'un objet</p>
      <p><img src="../images/tuts/bases/principe-pile.gif" width="115" height="245" align="left">Un 
        nouvel objet prend naissance par la cr&eacute;ation d'une primitive. Les 
        primitives sont des formes basiques <a href="creer-shapes.php" class="link1">2D</a> 
        ou <a href="creer-geometry.php" class="link1">3D</a>.</p>
      <p>Chaque primitive dispose de param&egrave;tres qui d&eacute;finissent 
        le nombre de segments utilis&eacute;s pour la dessiner. Plus le nombre 
        est &eacute;lev&eacute; et plus la primitive ressemblera &agrave; sa forme 
        math&eacute;matique id&eacute;ale. Mais plus le nombre de facettes sera 
        &eacute;lev&eacute;. Ce qui est &agrave; &eacute;viter en 3D temps r&eacute;el. 
        Il faut donc trouver le meilleur compromis entre r&eacute;alisme et nombre 
        de polygones l&eacute;ger.</p>
      <p>La primitive est ensuite utilis&eacute;e en entr&eacute;e d'un premier 
        modificateur. Celui-ci peut avoir un effet sur la position des points 
        de l'objet ou d'autres propri&eacute;t&eacute;s comme le mat&eacute;riau 
        attribu&eacute; &agrave; l'objet, les coordonn&eacute;es de projection 
        des textures...</p>
      <p>Le r&eacute;sultat en sortie du premier modificateur sera utilis&eacute;, 
        &agrave; son tour, en entr&eacute;e du second modificateur et ainsi de 
        suite.</p>
      </span>
      <p><span class="text">Les op&eacute;rations de translation, rotation et 
        homoth&eacute;tie des objets ne sont pas des modificateurs mais des transformations. 
        Elles sont toutes combin&eacute;es en une unique op&eacute;ration de changement 
        de rep&egrave;re qui sera appliqu&eacute;e apr&egrave;s le dernier modificateur.</span></p>
      <p><span class="text">Si l'on souhaite effectuer une telle op&eacute;ration 
        et qu'elle s'ins&egrave;re dans les modificateurs, une m&eacute;thode 
        simple est de travailler sur les sous-objets.</span></p>
      <p>Exemple de Modificateurs</p>
      <span class="text"> 
      <p><img src="../images/tuts/bases/pile.gif" width="174" height="165" align="left" border="1">Voici 
        un exemple de pile de modificateurs.</p>
      <p>La primitive est ici un parall&eacute;l&eacute;pip&egrave;de (Box) qui 
        a subi 3 modifications. Un Edit Mesh pour commencer. Ce modificateur permet 
        de travailler sur les sous-objets. Puis un UVW Mapping, qui cr&eacute;e 
        des coordonn&eacute;es de mapping pour l'application des textures. Enfin, 
        un Unwrap UVW qui permet d'ajuster finement les coordonn&eacute;es de 
        mapping.</p>
      <p>Ces trois modificateurs sont sans doute les plus utiles pour mod&eacute;liser 
        un objet pour Train Simulator.</p>
      <p>Il est possible effacer un modificateur (ic&ocirc;ne de poubelle) ou 
        de faire des Undo. Cependant, une longue pile de modificateurs a un co&ucirc;t 
        en terme de performances et d'occupation m&eacute;moire. Une fois qu'un 
        objet a la forme voulue, on peut &eacute;craser la pile.</p>
      <p>En cliquant droit sur la pile, un menu contextuel s'ouvre. Cliquer sur 
        <b>Collapse All</b>. L'objet devient une <b>Editable Mesh</b>. L'historique 
        a disparu et l'objet est beaucoup plus l&eacute;ger en m&eacute;moire. 
        gmax est plus stable quand on r&eacute;alise r&eacute;guli&egrave;rement 
        ce genre de m&eacute;nage.</p>
      <p><span class="soustitre1">Objets et sous-objets</span></p>
      <p><img src="../images/tuts/bases/sous-obj.gif" width="174" height="165" align="left" border="1"> 
        Beaucoup de modificateurs proposent de travailler sur des sous-objets. 
        Edit Mesh est le plus int&eacute;ressant puisqu'il permet de travailler 
        sur les sous-objets topologiques : les vertices, les segments (edge), 
        les triangles (face), les ensembles de triangles (polygon) ou bien des 
        &eacute;l&eacute;ments qui composent l'objet.
      <p>Si l'on se met en mode Vertex, on s&eacute;lectionne l'ensemble des points 
        puis on utilise une transformation (translation, rotation ou homoth&eacute;tie), 
        cette transformation sera incluse dans le modificateur Edit Mesh et sera 
        ex&eacute;cut&eacute;e avant le modificateur suivant.
      <p>Pour le travail en 2D sur les splines, il existe le modificateur Edit 
        spline &eacute;quivalent.
      <p class="link1">Ferrovia - 29 Ao&ucirc;t 2004</p>
      </span></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
