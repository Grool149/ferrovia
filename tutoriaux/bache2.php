<html>
<head>
<title>[Ferrovia] - Mod&eacute;lisation d'un b&acirc;ch&eacute; kils - 2nde partie</title>
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
        (2nde partie)</font></span></p>
      <p class="text"><a href="bache.php" class="link1">retour 1ere partie</a><span class="text"> 
        </span></p>
      <span class="text"> 
      <p>La premi&egrave;re partie de ce tutorial a permis de mod&eacute;liser 
        un quart de la b&acirc;che du kils. Les autres parties seront obtenues 
        par sym&eacute;trie. Le premier travail est de texturer la b&acirc;che. 
        Ce travail ne sera effectu&eacute; que sur une moiti&eacute;. La sym&eacute;trie 
        permettra d'obtenir une autre demi-b&acirc;che d&eacute;j&agrave; textur&eacute;e. 
        Pourquoi faire deux fois ce qu'on peut faire en une seule?</p>
      <p>S&eacute;lectionner le quart de b&acirc;che. Cliquer sur le bouton <b>Align 
        </b><img src="../images/tuts/align.gif" align="absmiddle" border="1">. 
        Aligner la b&acirc;che par rapport &agrave; elle-m&ecirc;me, sur l'axe 
        <b>Y</b>, en paramétrant <b>Minimum</b> pour <b>Current Object</b>, <b>Maximum</b> 
        pour <b>Target Object</b>.</p>
      <p>S&eacute;lectionner <b>World</b> comme rep&egrave;re de r&eacute;f&eacute;rence 
        et placer le rep&egrave;re courant &agrave; l'origine du rep&egrave;re 
        de r&eacute;f&eacute;rence. Cette phrase n'&eacute;tait pas claire?? Bon, 
        il faut r&eacute;gler comme &ccedil;a: <img src="../images/tuts/creation/kils18.gif" align="absmiddle" border="1" width="108" height="34"></p>
      <p>Cliquer sur le bouton de sym&eacute;trie <img src="../images/tuts/bases/gmax_8.gif" border="1" width="30" height="31" align="absmiddle"> 
        et, dans la fen&ecirc;tre qui s'ouvre, r&eacute;gler <b>Mirror Axis</b> 
        sur <b>Y</b> et <b>Clone Selection</b> sur <b>Copy</b>.</p>
      <p>Dans le panneau de commande <b>Modify </b><img src="../images/tuts/modif.gif" align="absmiddle" border="1">, 
        cliquer sur <b>Attach</b> puis s&eacute;lectionner la permi&egrave;re 
        partie de la b&acirc;che. Ces deux quarts de b&acirc;che sont d&eacute;sormais 
        fusionn&eacute;es un objet unique. Toutefois, l'ar&ecirc;te &agrave; la 
        jonction est visible.</p>
      <p><img src="../images/tuts/creation/kils19.jpg" width="321" height="205" border="1"></p>
      <p> Ce n'est pas un probl&egrave;me de groupe de lissage. Car, par sym&eacute;trie, 
        les groupes de lissage des facettes de part et s'autre de cette ar&ecirc;te 
        sont identiques.</p>
      <p>Le probl&egrave;me est que la copie concerne &eacute;galement les vertices 
        de cette ar&ecirc;te. Il y a donc deux ar&ecirc;tes confondues dans l'espace. 
        Il faut fusionner les vertices pour n'obtenir qu'une seule ar&ecirc;te 
        et le lissage d&eacute;sir&eacute;. De m&ecirc;me, dans de la premi&egrave;re 
        partie de ce tutorial, nous g&eacute;n&eacute;rions des points doubles 
        en &eacute;tirant le bas de la b&acirc;che.</p>
      <p>ans le panneau de commande <b>Modify </b><img src="../images/tuts/modif.gif" align="absmiddle" border="1">, 
        cliquer sur l'ic&ocirc;ne <b>Vertex </b><img src="../images/tuts/vertex.gif" align="absmiddle" border="1">. 
        S&eacute;lectionner tous les vertices. Le panneau de commande affiche 
        158 vertices. Dans le panneau d&eacute;roulant <b>Edit Geometry</b> se 
        trouve une section <b>Weld</b> (souder en anglais). La valeur &agrave; 
        c&ocirc;t&eacute; du bouton <b>Selected</b> affiche 0,1. Cela veut dire 
        que la fonction va souder les vertices proches d'une distance inf&eacute;rieure 
        &agrave; 10 cm. Ce qui risquerait d'endommager des mod&egrave;les fins. 
        Dans notre cas, les points doubles sont deux points jumeaux ayant des 
        coordonn&eacute;es spatiales identiques &agrave; la pr&eacute;cision de 
        gMax pr&egrave;s. Il convient de r&eacute;gler la valeur &agrave; 0,001 
        pour &eacute;viter tout probl&egrave;me. Cliquer sur <b>Selected</b>. 
        Il n'y a plus que 150 vertices et l'ar&ecirc;te est liss&eacute;e.</p>
      </span>
      <p><span class="soustitre1">Texture et mapping</span></p>
      <span class="text"> 
      <p>Nous allons texturer la demi-b&acirc;che avec cette image.</p>
      <p><img src="../images/tuts/creation/kils20.jpg" width="512" height="512" border="1"></p>
      <p>Avant tout, il faut cr&eacute;er un mat&eacute;riau utilisant cette texture. 
      </p>
      <p>Ouvrir le gestionnaire de matériaux <b> </b><img src="../images/tuts/mattool.gif" align="absmiddle" border="1" width="29" height="30">, 
        cliquer sur <b>New</b>. Dans le cadre <b>Texture</b>, cliquer sur <b>Open</b> 
        et choisir la texture sur le disque dur. Dans le cadre <b>Train Sim Material 
        Settings</b>, laisser <b>Shader</b> sur <b>TexDiff</b> (mat&eacute;riau 
        opaque), r&eacute;gler <b>Mip LOD Bias</b> à -3 pour retarder l'effet 
        du Mip Mapping de 3 niveaux. Cliquer sur Put!. Le mat&eacute;riau est 
        affect&eacute; &agrave; l'objet courant, c'est &agrave; dire la b&acirc;che.</p>
      <p>Il faut mapper d&eacute;sormais. Dans la liste des modificateurs, cliquer 
        sur <b>UVW Map</b>. Configurer le cadre <b>Mapping</b> en <b>Planar</b>, 
        le cadre <b>Alignment</b> sur <b>X</b> et cliquer sur <b>Bitmap Fit</b>. 
        Choisir la m&ecirc;me texture. Ainsi le mapping se base sur une forme 
        carr&eacute;e comme la texture et les mappings sur les axes U et V sont 
        proportionnels.</p>
      <p><img src="../images/tuts/creation/kils21.gif" width="390" height="268" border="1"></p>
      <p>Le cadre orange repr&eacute;sente le mapping. Il est carr&eacute; mais 
        pas &agrave; la bonne &eacute;chelle.</p>
      </span>
      <p><span class="text">Dans la liste des modificateurs, cliquer sur <b>Unwrap 
        UVW</b>. puis sur le bouton Edit. L'&eacute;diteur s'ouvre. S&eacute;lectionner 
        tous les points de mapping. A l'aide des fonctions d'&eacute;chelle et 
        de translation, caler les coordonn&eacute;es de mapping par rapport &agrave; 
        l'image. La texture sera invers&eacute;e, alors utiliser le bouton de 
        sym&eacute;trie. </span></p>
      <p><img src="../images/tuts/creation/kils22.gif" width="534" height="531" border="1"></p>
      <span class="text"> 
      <p>R&eacute;ajuster les points pour rattrapper les d&eacute;fauts de la 
        texture. Une fois le mapping termin&eacute;, voici le r&eacute;sultat:</p>
      <p><img src="../images/tuts/creation/kils23.jpg" width="412" height="238" border="1"></p>
      <p>Comme pour la premi&egrave;re sym&eacute;trie, replacer le rep&egrave;re 
        &agrave; l'origine de World. Cliquer sur <img src="../images/tuts/bases/gmax_8.gif" border="1" width="30" height="31" align="absmiddle"> 
        et, dans la fen&ecirc;tre qui s'ouvre, r&eacute;gler <b>Mirror Axis</b> 
        sur <b>XY</b> et <b>Clone Selection</b> sur <b>Copy</b>. </p>
      <p>Cliquer droit sur les modificateurs et cliquer sur <b>Collapse All</b> 
        dans le menu contextuel. L'objet est devenu une <b>Editable Mesh</b>. 
        Fusionner les deux demi-b&acirc;ches avec la fonction <b>Attach</b>.</p>
      </span>
      <p><span class="soustitre1">Mise &agrave; l'origine du rep&egrave;re</span></p>
      <span class="text">
      <p>Si le pivot de la b&acirc;che n'est pas plac&eacute; en (0,0,0) dans 
        le rep&egrave;re World, nous risquons de grosses surprises dans le jeu.</p>
      <p>&nbsp;</p>
      <p>Le rendu sous MSTS donne ceci:</p>
      <p><img src="../images/tuts/creation/kils24.jpg" width="491" height="357" border="1"></p>
      <p>&nbsp;</p>
      <p class="link1">Ferrovia - 30 Juin 2003</p>
      </span> </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
