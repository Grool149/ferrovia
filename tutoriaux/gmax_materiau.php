<html>
<head>
<title>[Ferrovia] - Les Mat&eacute;riaux et le Mapping</title>
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
<p><span class="titre">Les Mat&eacute;riaux et le Mapping </span></p>
<p><a href="#para1" class="link1">1 - Les bases</a><br>
  <a href="#para2" class="link1">2 - Le gestionnaire de mat&eacute;riaux</a><br>
  <a href="#para3" class="link1">3 - Appliquer des matériaux dans Gmax</a></p>
<span class="text"> 
<p class="soustitre1"><a name="para1"></a>1 - Les bases</p>
<p class="soustitre2"> 1.1 - Les matériaux</p>
<p> Un matériau c'est non seulement une texture mais aussi différents paramètres 
  qui lui sont liés :</p>
<ul>
  <li>le Shader : C'est principalement les propriétés du matériau lors de l'affichage 
    (application d'une couleur diffuse, d'une texture, d'une couche alpha...)</li>
  <li>le comportement lumineux (réflexion, brillance, auto-luminescence, transparence)</li>
  <li>le mode de filtrage de la texture</li>
  <li>le fonctionnement du Z-Buffer (tableau utilisé pour trier les facettes en 
    fonction de leur profondeur par rapport à l'écran)</li>
  <li>le fonctionnement de la couche alpha (transparence tout ou rien, ou niveau 
    de gris)</li>
</ul>
Un matériau peut être un multi-matériau. Il comporte alors plusieurs sous-matériaux 
standards qui sont repérés par un identifiant : le <b>material ID</b> 
<p class="soustitre2">1.2 - L'application d'un matériau à un objet</p>
<p> Chaque objet 3D se voit attribuer un seul et unique matériau. Chaque facette 
  de l'objet possède un <b>material ID</b>. Ainsi, si le matériau est multiple, 
  chaque facette sera habillée avec le sous-matériau qui correspond à son <b>material 
  ID</b>.</p>
<p class="soustitre2">1.3 - Le Mapping</p>
<p>Comment est appliqu&eacute;e une texture sur un objet? Pour faire simple, il 
  faut savoir que chaque vertex poss&eacute;dent 5 coordonn&eacute;es. X, Y, Z 
  sont les trois coordonn&eacute;es spatiales du point. U, V sont des coordonn&eacute;es 
  planes sur la texture. Lors de l'affichage d'un polygone &agrave; l'&eacute;cran, 
  le jeu calcule la position des trois sommets par rapport &agrave; la cam&eacute;ra. 
  Puis il d&eacute;coupe un triangle dans la texture, le d&eacute;forme et le 
  dessine sur l'&eacute;cran &agrave; la position des trois sommets.</p>
<p class="soustitre1"><a name="para2"></a>2 - Gestionnaire de matériaux</p>
<p class="soustitre2"> 2.1 - Gestionnaire du gamepack Microsoft <img src="../images/tuts/mattool.gif" width="29" height="30" border="1"></p>
<p> Le gestionnaire de matériaux fait partie du gamepack de Microsoft. C'est donc 
  un module spécifique à MSTS qui prend la place du gestionnaire original fourni 
  avec gmax. Il gère donc des matériaux spécifiquement adaptés à MSTS. Les textures 
  acceptées sont uniquement des *.ace non compressées. (Nota : on peut créer des 
  matériaux avec des fichiers *.bmp ou *.tga, mais le <b>LOD Manager</b> refusera 
  de compiler le modèle)</p>
<p><img src="../images/tuts/creation/1proj_3.gif" width="336" height="480" border="1"></p>
<p class="soustitre2"> 2.2 - Les Shaders</p>
<p> Parmis les shaders proposés, seuls deux sont à utiliser : <b>TexDiff</b> pour 
  les matériaux opaques, <b>BlendATexDiff</b> pour les matériaux transparents 
  ou translucides. Les autres causeront des effets inattendus dans le simulateur.</p>
      <p class="soustitre2"> 2.3 - La Lighting Palette</p>
<p> Ce sont les différents comportements lumineux supportés par MSTS.</p>
<p> <b>OptSpecular0</b> : affichage standard<br>
  <b>OptSpecular750</b> : matériau légèrement brillant<br>
  <b>OptSpecular25</b> : matériau très brillant<br>
  <b>OptHalfbright</b> : matériau faiblement auto-luminescent<br>
  <b>OptFullbright</b> : matériau fortement auto-luminescent<br>
  <b>DarkShade</b> : matériau sombre. réagit peu à la lumière ambiante<br>
  <b>Cruciform</b> et <b>CruciformLong</b> : ces deux modes sont insensibles à 
  l'<a href="gouraud.php" class="link1">ombrage de Gouraud</a>. Ils sont utilisés 
  pour faire des arbres avec deux rectangles qui se croisent sans présenter des 
  reflets de couleurs différentes. </p>
<p class="soustitre2">2.4 - Filter Mode</p>
<p> Laisser sur <b>MipLinear</b></p>
<p class="soustitre2"> 2.5 - Z-Buffer Mode</p>
<p> Laisser sur <b>Normal</b></p>
<p class="soustitre2"> 2.6 - Alpha Test Mode</p>
<p> Sans effet sur un matériau opaque<br>
  Si le shader est <b>BlendATexDiff</b>, <b>None</b> donnera des semi-transparences, 
  <b>Trans</b> donnera du tout ou rien.</p>
<p class="soustitre2"> 2.7 - Mip LOD Bias</p>
<p> C'est une petite fonction spécifique de MSTS pour contourner un problème d'affichage 
  avec le Mip mapping.</p>
<p> <u>Rappel sur le Mip Mapping</u> :<br>
  Lorsqu'un objet s'éloigne de l'écran, ses facettes deviennent petites et l'application 
  des textures, malgré le filtrage, fait apparaître des défauts (effets d'escaliers, 
  pâtés de pixels...). Le Mip Mapping consiste à décliner une texture en plusieurs 
  tailles différentes.<br>
  Lors de la conversion d'une image 512*512 BMP en ACE, La texture finale comportera 
  des versions 512*512, 256*256, 128*128...etc intégrées dans le même fichier. 
  L'image adéquate sera utilisée en fonction de l'éloignement de l'objet. Un intérêt 
  secondaire à cette technique est d'utiliser des textures plus petites pour les 
  objets d'arrière plan et soulager ainsi la carte graphique. (Nota : Les textures 
  ACE 1024*1024 n'ont pas de Mip mapping)</p>
<p> MSTS affiche souvent trop tôt les niveaux de Mip Mapping moins détaillés. 
  Ce qui est assez laid. Le <b>Mip LOD Bias</b> permet de retarder cet effet. 
  On utilise en général la valeur -3.0 pour avoir un rendu correct.</p>
<p class="soustitre1"><a name="para3"></a>3 - Appliquer des matériaux dans Gmax</p>
<p> Entrons maintenant dans la phase pratique. Nous avons un objet 3D quelconque 
  à texturer et un matériau. </p>
<p class="soustitre2">3.1 - Edit Mesh (facultatif)</p>
<p> On peut appliquer directement une texture sur un objet. Mais, bien souvent, 
  il est préférable de sélectionner des sous-ensembles de l'objet parce qu'elles 
  ne recevront pas le même matériau ou celui-ci sera appliqué fort différemment. 
  Le modificateur Edit Mesh est alors nécessaire. Il permet de sélectionner une 
  ou plusieurs facettes et travailler dessus sans perturber le reste de l'objet.</p>
<p><img src="../images/tuts/bases/editmesh_01.gif" width="173" height="212" border="1"> 
</p>
<p class="soustitre2">3.2 - UVWMap</p>
<p>Pour repr&eacute;senter un nuage de points 3D dans l'espace plan d'une texture, 
  il faut &agrave; un moment ou un autre r&eacute;aliser une projection. C'est 
  le modificateur UVW Map qui s'en charge. Il crée les coordonnées de Mapping 
  de l'objet<br>
  (Nota : Pour les formes de base, des coordonnées par d&eacute;faut peuvent &ecirc;tre 
  cr&eacute;&eacute;es en m&ecirc;me temps que la primitive).</p>
<img src="../images/tuts/bases/uvwmap_01.gif" width="180" height="635" border="1"> 
<p>D&eacute;taillons un peu les param&egrave;tres utiles pour cr&eacute;er des 
  add-ons pour MSTS.</p>
<p>Dans la section <b>Mapping</b>, UVWMap propose plusieurs modes de projection 
  diff&eacute;rents. L'espace de la texture est repr&eacute;sent&eacute; par un 
  objet orange qu'on appelle le <b>Gizmo</b>.<br>
  <b>U Tile</b> et <b>V Tile</b> servent &agrave; r&eacute;p&eacute;ter plusieurs 
  fois la texture dans le Gizmo dans le sens de la largeur ou de la longueur. 
  La Case <b>Flip</b> sert &agrave; retourner la texture selon chaque axe. Cependant 
  on verra qu'il est plus facile d'adapter le mapping sur notre objet en utilisant 
  le modificateur <b>Unwrap UVW</b> d&eacute;crit au paragraphe suivant.</p>
<p>- Projection plane<br>
  <img src="../images/tuts/bases/uvwmap_02.gif" width="389" height="389" border="1"><br>
  C'est s&ucirc;rement la plus utilis&eacute;e. Dans la section <b>alignment</b>, 
  le Gizmo peut &ecirc;tre facilement orient&eacute; selon sur les axes X, Y ou 
  Z.<br>
  Tr&egrave;s utile &eacute;galement, la touche <b>Bitmap Fit</b> vous demande 
  de s&eacute;lectionner une image sur le disque dur. Elle va forcer la proportion 
  entre la longueur et la largeur du Gizmo. Dans le cas de MSTS, on s'assurera 
  ainsi que le Gizmo sera carr&eacute; et que les textures ne seront pas &eacute;tir&eacute;es 
  dans une direction.</p>
<p>- Projection cylindrique<br>
  <img src="../images/tuts/bases/uvwmap_03.gif" width="389" height="389" border="1"> 
</p>
<p>La texture s'enroule autour d'un axe</p>
<p>- Projection sph&eacute;rique<br>
  <img src="../images/tuts/bases/uvwmap_04.gif" width="389" height="389" border="1"></p>
<p>La texture est projet&eacute;e suivant un sph&egrave;re. Ce mode entraine &eacute;videmment 
  de fortes distortions.</p>
<p>- Projection &quot;Boite&quot;<br>
  <img src="../images/tuts/bases/uvwmap_05.gif" width="389" height="389" border="1"></p>
<p>Comparable &agrave; la projection plane mais suivant 6 directions en m&ecirc;me 
  temps. </p>
<p>- Projection face</p>
<p>Il n'y pas de Gizmo pour repr&eacute;senter cette projection. Chaque polygone 
  est &eacute;tir&eacute; sur la texture toute enti&egrave;re.</p>
<p><span class="text">Il est possible, dans la pile des modificateurs de s&eacute;lectionner 
  le sous-objet <b>Gizmo</b>. On peut alors lui faire subir des translations, 
  rotations ou changements d'&eacute;chelle. </span></p>
<p class="soustitre2">3.3 - Unwarp UVW</p>
<p>Le modificateur Unwrap UVW permet d'affiner les coordonn&eacute;es de mapping 
  d'un objet.</p>
<p><img src="../images/tuts/bases/unwrapuvw_01.gif" width="175" height="503" border="1"></p>
<p>Dans le menu des param&egrave;tres, seul le bouton <b>Edit</b> est utile. Il 
  ouvre une fen&ecirc;tre dans laquelle nous allons travailler.</p>
<p><img src="../images/tuts/bases/unwrapuvw_02.gif" width="575" height="549" border="1"></p>
<p>Nous voyons alors chaque point de notre objet et la texture du mat&eacute;riau. 
  Dans l'exemple ci-dessus, c'est une projection plane qui a &eacute;t&eacute; 
  choisie.</p>
<p>Voyons les fonctions utiles dans cette fen&ecirc;tre d'&eacute;dition, de gauche 
  &agrave; droite, de haut en bas.</p>
<p><img src="../images/tuts/bases/unwrapuvw_03.gif" width="30" height="95" border="1"> 
  Il est possible de s&eacute;lectionner des points et les translater. On peut 
  bloquer les translations horizontalement ou verticalement.</p>
<p><img src="../images/tuts/bases/unwrapuvw_04.gif" width="29" height="92" border="1"> 
  Il est possible de s&eacute;lectionner des points et changer leur &eacute;chelle. 
  On peut bloquer l'homoth&eacute;tie horizontalement ou verticalement. </p>
<p><img src="../images/tuts/bases/unwrapuvw_05.gif" width="31" height="115" border="1"> 
  Il est possible de s&eacute;lectionner des points et d'en faire une sym&eacute;trie. 
  On peut faire des sym&eacute;trie horizontales ou verticales.</p>
<p><img src="../images/tuts/bases/unwrapuvw_06.gif" width="113" height="93" border="1"> 
  Dans le cas d'un Multi-mat&eacute;riau, cette boite permet de s&eacute;lectionner 
  les diff&eacute;rentes textures ou m&ecirc;me d'aller en chercher une autre 
  sur le disque dur.</p>
<p><img src="../images/tuts/bases/unwrapuvw_07.gif" width="201" height="21" border="1"> 
  Il est possible de d&eacute;finir tr&egrave;s pr&eacute;cisement les coordonn&eacute;es 
  de mapping d'un point.<br>
  On travail dans un rep&egrave;re UV, les coordonn&eacute;es W n'ont donc pas 
  d'utilit&eacute; dans notre cas. Le point de coordonn&eacute;es (0, 0) se trouve 
  au coin en bas &agrave; gauche de la texture. Le point de coordonn&eacute;es 
  (1, 1) se trouve au coin en haut &agrave; droite. Il est possible de donner 
  des coordonn&eacute;es inf&eacute;rieures &agrave; z&eacute;ro ou sup&eacute;rieure 
  &agrave; 1. La texture se r&eacute;p&egrave;te &agrave; l'infini dans toutes 
  les directions.</p>
<p><img src="../images/tuts/bases/unwrapuvw_08.gif" width="75" height="143" border="1"> 
  Dans le cas d'un Multi-mat&eacute;riau, cette boite permet de filtrer les polygones 
  en fonction de leur Material ID. Lorqu'il y a de nombreux sous-mat&eacute;riaux, 
  l'affichage serait rapidement embrouillant.</p>
<p><img src="../images/tuts/bases/unwrapuvw_09.gif" width="95" height="29" border="1"> 
  Ce sont les fonctions habituelles qui permettent de se d&eacute;placer ou zoomer 
  dans la fen&ecirc;tre.</p>
<p><img src="../images/tuts/bases/unwrapuvw_10.gif" width="24" height="26" border="1"> 
  <b>Pixel Snap</b>. Quand ce bouton est actif, le d&eacute;placement des points 
  sur la textures force leur calage pr&eacute;cis sur un pixel de la texture.</p>
<p><img src="../images/tuts/bases/unwrapuvw_11.gif" width="347" height="299" border="1"> 
  Par d&eacute;faut, les lignes et points apparaissent en blanc, les points s&eacute;lectionn&eacute;s 
  en rouge. Afin d'am&eacute;liorer la visibilit&eacute;, si la texture de fond 
  est blanche par exemple, il est possible de modifier ces couleurs dans la fen&ecirc;tre 
  des options en cliquant sur le carr&eacute; de couleur. Ici, le blanc est remplac&eacute; 
  par du bleu.</p>
<p class="soustitre2">3.4 - Conclusion et r&eacute;sum&eacute;</p>
<p>Lorsque je souhaite appliquer une texture sur une partie d'un objet, j'utilise 
  un modificateur <b>Edit Mesh</b>, je s&eacute;lectionne les polygones sur lesquels 
  je veux travailler, je cr&eacute;e un nouveau mat&eacute;riau si celui-ci n'existe 
  pas d&eacute;j&agrave; ou, dans le cas contraire, j'affecte un <b>Material ID</b> 
  pour les polygones s&eacute;lectionn&eacute;s.</p>
<p>J'applique un modificateur <b>UVW Map</b> pour projeter le mat&eacute;riau 
  sur mes polygones.</p>
<p>J'applique un modificateur <b>Unwrap UVW</b> pour editer le mapping et coller 
  finement ma texture sur les polygones.</p>
<p class="link1">Ferrovia - 15 Octobre 2005</p>
</span> 
	</td>
  </tr>
</table>
</body>
</html>
