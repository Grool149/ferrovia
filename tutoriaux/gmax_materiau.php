<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Les bases de gmax : Les Mat&eacute;riaux et le Mapping</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../../ferrovia.ico" type="image/bmp" />
<link rel="stylesheet" href="../../miseenpage.css" />
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
<div class="SectionBloc">
<p class="titre">gmax : Les mat&eacute;riaux et le mapping</p>
<p><a href="#para1" class="link1">1 - Les bases</a><br />
<a href="#para2" class="link1">2 - Le gestionnaire de mat&eacute;riaux</a><br />
<a href="#para3" class="link1">3 - Appliquer des mat�riaux dans gmax</a></p>
<p class="titre2"><a name="para1">1 - Les bases</a></p>
<p>Ce paragraphe traite des mat�riaux tels qu'ils sont cr��s et manipul�s par gmax pour r�aliser des mod�les pour Microsoft Train Simulator. Quelques diff�rences peuvent se pr�senter pour d'autres modeleurs et d'autres jeux, mais le principe reste globalement le m�me.</p>
<p class="link1">1.1 - Les mat�riaux</p>
<p>Un mat�riau, c'est non seulement une texture mais aussi diff�rents param�tres qui lui sont li�s :</p>
<ul>
  <li>le Shader : propri�t�s et comportement du mat�riau lors de l'affichage (application d'une couleur diffuse, d'une texture, d'une couche alpha...)</li>
  <li>le "Light Material" : le comportement lumineux (r�flexion, brillance, auto-luminescence, transparence)</li>
  <li>le mode de filtrage de la texture</li>
  <li>le fonctionnement du Z-Buffer (tableau utilis� pour trier les pixels en fonction de leur profondeur par rapport � l'�cran)</li>
  <li>le fonctionnement de la couche alpha (transparence tout ou rien, ou niveau de gris)</li>
</ul>
Un mat�riau peut �tre un multi-mat�riau. Il comporte alors plusieurs sous-mat�riaux standards qui sont rep�r�s par un identifiant : le <span class="link1">material ID</span> 
<p class="link1">1.2 - L'application d'un mat�riau � un objet</p>
<p>Chaque objet 3D se voit attribuer un seul et unique mat�riau. Chaque facette de l'objet poss�de un <span class="link1">material ID</span>. Ainsi, si le mat�riau est multiple, 
chaque facette sera habill�e avec le sous-mat�riau qui correspond � son <span class="link1">material ID</span>.</p>
<p class="link1">1.3 - Le placage de texture (Mapping)</p>
<p>Comment est appliqu&eacute;e une texture sur un objet? Pour faire simple, il faut savoir que chaque vertex poss&eacute;dent 5 coordonn&eacute;es. X, Y, Z sont les trois coordonn&eacute;es 
spatiales du point. U, V sont des coordonn&eacute;es planes sur la texture. Lors de l'affichage d'un polygone &agrave; l'&eacute;cran, l'ordinateur calcule la position des trois sommets par rapport &agrave; la cam&eacute;ra.
Puis il d&eacute;coupe un triangle dans la texture, le d&eacute;forme et le dessine sur l'&eacute;cran &agrave; la position des trois sommets.</p>
<p class="titre2"><a name="para2">2 - Gestionnaire de mat�riaux</a></p>
<p class="link1">2.1 - Gestionnaire du gamepack Microsoft <img style="border:1px solid black" src="../images/tuts/mattool.gif" width="29" height="30" alt="" /></p>
<p>Le gestionnaire de mat�riaux fait partie du gamepack de Microsoft. C'est donc un module sp�cifique � MSTS qui prend la place du gestionnaire original fourni 
avec gmax. Il g�re des mat�riaux sp�cifiquement adapt�s � MSTS. Les textures accept�es sont uniquement des *.ace non compress�es ou compress�s en zlib. gmax ne sait pas lire les textures compress�s au format DXT1. 
(Nota : on peut cr�er des mat�riaux avec des fichiers *.bmp ou *.tga, mais le <span class="link1">LOD Manager</span> refusera de compiler le mod�le)</p>
<p><img style="border:1px solid black" src="../images/tuts/creation/1proj_3.gif" width="336" height="480" alt="Gestionnaire de materiaux" /></p>
<p class="link1">2.2 - Les Shaders</p>
<p>Parmis les shaders propos�s, deux sont particuli�rement utiles : <b>TexDiff</b> pour les mat�riaux opaques, <b>BlendATexDiff</b> pour les mat�riaux transparents ou translucides.</p>
<p class="link1">2.3 - La Lighting Palette</p>
<p>Ce sont les diff�rents comportements lumineux support�s par MSTS.</p>
<p><b>OptSpecular0</b> : affichage standard<br />
<b>OptSpecular750</b> : mat�riau l�g�rement brillant<br />
<b>OptSpecular25</b> : mat�riau tr�s brillant<br />
<b>OptHalfbright</b> : mat�riau faiblement auto-luminescent<br />
<b>OptFullbright</b> : mat�riau fortement auto-luminescent<br />
<b>DarkShade</b> : mat�riau sombre. r�agit peu � la lumi�re ambiante<br />
<b>Cruciform</b> et <b>CruciformLong</b> : ces deux modes sont insensibles � l'<a href="gouraud.php" class="link1">ombrage de Gouraud</a>. Ils sont utilis�s pour faire des arbres avec 
deux rectangles qui se croisent sans pr�senter des reflets de couleurs diff�rentes.</p>
<p class="link1">2.4 - Filter Mode</p>
<p>Laisser sur <b>MipLinear</b></p>
<p class="link1">2.5 - Z-Buffer Mode</p>
<p>Laisser sur <b>Normal</b></p>
<p class="link1">2.6 - Alpha Test Mode</p>
<p>Sans effet sur un mat�riau opaque<br />
Si le shader est <b>BlendATexDiff</b>, <b>None</b> donnera des semi-transparences, <b>Trans</b> donnera du tout ou rien.<br />
Nota : les facettes trait�es en semi-transparence devront �tre tri�es. En raison du fonctionnement du Z-buffer, elles doivent �tre dessin�es apr�s les autres sinon, on risque de voir disparaitre la g�om�trie
qui devrait apparaitre derri�re gr�ce � la transparence. En revanche, pour les facettes "Trans", les pixels totalement transparents n'affectent pas le Z-buffer et l'arri�re plan est correctement dessin�.</p>
<p class="link1">2.7 - Mip LOD Bias</p>
<p>C'est une petite fonction sp�cifique de MSTS pour contourner un probl�me d'affichage avec le Mip mapping.</p>
<p><span style="text-decoration:underline;">Rappel sur le Mip Mapping</span> :<br />
Lorsqu'un objet s'�loigne de l'�cran, ses facettes deviennent petites et l'application des textures, malgr� le filtrage, fait appara�tre des d�fauts de Moir� (effets d'escaliers, 
p�t�s de pixels...). Le Mip Mapping consiste � d�cliner une texture en plusieurs tailles diff�rentes.<br />
Lors de la conversion d'une image 512*512 BMP en ACE, La texture finale comportera des versions 512*512, 256*256, 128*128...etc int�gr�es dans le m�me fichier. L'image ad�quate sera utilis�e en 
fonction de l'�loignement de l'objet. Un int�r�t secondaire � cette technique est d'utiliser des textures plus petites pour les objets d'arri�re plan et soulager ainsi la carte graphique. (Nota : Les textures 
ACE 1024*1024 g�n�r�es avec l'utilitaire MakeAceWin n'ont pas de Mip mapping).</p>
<p>MSTS affiche souvent trop t�t les niveaux de Mip Mapping moins d�taill�s. Ce qui est assez laid. Le <b>Mip LOD Bias</b> permet de retarder cet effet. On utilise en g�n�ral la valeur -3.0 pour avoir un rendu correct.</p>
<p class="titre2"><a name="para3">3 - Appliquer des mat�riaux dans gmax</a></p>
<p>Entrons maintenant dans la phase pratique. Nous avons un objet 3D quelconque � texturer et un mat�riau.</p>
<p class="link1">3.1 - Edit Mesh (facultatif)</p>
<p> On peut appliquer directement une texture sur un objet. Mais, bien souvent, il est pr�f�rable de s�lectionner des sous-ensembles de l'objet parce qu'elles 
ne recevront pas le m�me mat�riau ou celui-ci sera appliqu� fort diff�remment. Le modificateur Edit Mesh est alors n�cessaire. Il permet de s�lectionner une 
ou plusieurs facettes et travailler dessus sans perturber le reste de l'objet.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/editmesh_01.gif" width="173" height="212" alt="modificateur Edit mesh" /></p>
<p class="link1">3.2 - UVW Map</p>
<p>Pour repr&eacute;senter un nuage de points 3D dans l'espace plan d'une texture, il faut &agrave; un moment ou un autre r&eacute;aliser une projection. C'est 
le modificateur UVW Map qui s'en charge. Il cr�e les coordonn�es de Mapping de l'objet<br />
(Nota : Pour les formes de base, des coordonn�es par d&eacute;faut peuvent &ecirc;tre cr&eacute;&eacute;es en m&ecirc;me temps que la primitive).</p>
<img style="border:1px solid black" src="../images/tuts/bases/uvwmap_01.gif" width="180" height="635" alt="modificateur UVW Map" />
<p>D&eacute;taillons un peu les param&egrave;tres utiles pour cr&eacute;er des add-ons pour MSTS.</p>
<p>Dans la section <b>Mapping</b>, UVW Map propose plusieurs modes de projection diff&eacute;rents. L'espace de la texture est repr&eacute;sent&eacute; par un 
objet orange qu'on appelle le <b>Gizmo</b>.<br />
<b>U Tile</b> et <b>V Tile</b> servent &agrave; r&eacute;p&eacute;ter plusieurs fois la texture dans le Gizmo dans le sens de la largeur ou de la longueur. 
La Case <b>Flip</b> sert &agrave; retourner la texture selon chaque axe. Cependant on verra qu'il est plus facile d'adapter le mapping sur notre objet en utilisant 
le modificateur <b>Unwrap UVW</b> d&eacute;crit au paragraphe suivant.</p>
<p>- Projection plane<br />
<img style="border:1px solid black" src="../images/tuts/bases/uvwmap_02.gif" width="389" height="389" alt="Projection plane" /><br />
C'est s&ucirc;rement la plus utilis&eacute;e. Dans la section <b>alignment</b>, le Gizmo peut &ecirc;tre facilement orient&eacute; selon sur les axes X, Y ou Z.<br />
Tr&egrave;s utile &eacute;galement, la touche <b>Bitmap Fit</b> vous demande de s&eacute;lectionner une image sur le disque dur. Elle va forcer la proportion 
entre la longueur et la largeur du Gizmo. Dans le cas de MSTS, on s'assurera ainsi que le Gizmo sera carr&eacute; et que les textures ne seront pas &eacute;tir&eacute;es 
dans une direction.</p>
<p>- Projection cylindrique<br />
<img style="border:1px solid black" src="../images/tuts/bases/uvwmap_03.gif" width="389" height="389" alt="Projection cylindrique" /> </p>
<p>La texture s'enroule autour d'un axe</p>
<p>- Projection sph&eacute;rique<br />
  <img style="border:1px solid black" src="../images/tuts/bases/uvwmap_04.gif" width="389" height="389" alt="Projection sph&eacute;rique" /></p>
<p>La texture est projet&eacute;e suivant un sph&egrave;re. Ce mode entraine &eacute;videmment de fortes distortions.</p>
<p>- Projection &quot;Boite&quot;<br />
  <img style="border:1px solid black" src="../images/tuts/bases/uvwmap_05.gif" width="389" height="389" alt="Projection &quot;Boite&quot;" /></p>
<p>Comparable &agrave; la projection plane mais suivant 6 directions en m&ecirc;me temps.</p>
<p>- Projection face</p>
<p>Il n'y pas de Gizmo pour repr&eacute;senter cette projection. Chaque polygone est &eacute;tir&eacute; sur la texture toute enti&egrave;re.</p>
<p>Il est possible, dans la pile des modificateurs de s&eacute;lectionner le sous-objet <b>Gizmo</b>. On peut alors lui faire subir des translations, 
rotations ou changements d'&eacute;chelle.</p>
<p class="link1">3.3 - Unwarp UVW (D�pliage UVW)</p>
<p>Le modificateur Unwrap UVW permet d'affiner les coordonn&eacute;es de mapping d'un objet.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_01.gif" width="175" height="503" alt="modificateur Unwarp UVW" /></p>
<p>Dans le menu des param&egrave;tres, seul le bouton <b>Edit</b> est utile. Il ouvre une fen&ecirc;tre dans laquelle nous allons travailler.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_02.gif" width="575" height="549" alt="Edit UVWs" /></p>
<p>Nous voyons alors chaque point de notre objet et la texture du mat&eacute;riau. Dans l'exemple ci-dessus, c'est une projection plane qui a &eacute;t&eacute; choisie.</p>
<p>Voyons les fonctions utiles dans cette fen&ecirc;tre d'&eacute;dition, de gauche &agrave; droite, de haut en bas.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_03.gif" width="30" height="95" alt="" />
Il est possible de s&eacute;lectionner des points et les translater. On peut bloquer les translations horizontalement ou verticalement.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_04.gif" width="29" height="92" alt="" />
Il est possible de s&eacute;lectionner des points et changer leur &eacute;chelle. On peut bloquer l'homoth&eacute;tie horizontalement ou verticalement.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_05.gif" width="31" height="115" alt="" />
Il est possible de s&eacute;lectionner des points et d'en faire une sym&eacute;trie. On peut faire des sym&eacute;trie horizontales ou verticales.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_06.gif" width="113" height="93" alt="" />
Dans le cas d'un Multi-mat&eacute;riau, cette boite permet de s&eacute;lectionner les diff&eacute;rentes textures ou m&ecirc;me d'aller en chercher une autre sur le disque dur.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_07.gif" width="201" height="21" alt="" />
Il est possible de d&eacute;finir tr&egrave;s pr&eacute;cisement les coordonn&eacute;es de mapping d'un point.<br />
On travail dans un rep&egrave;re UV, les coordonn&eacute;es W n'ont donc pas d'utilit&eacute; dans notre cas. Le point de coordonn&eacute;es (0, 0) se trouve
au coin en bas &agrave; gauche de la texture. Le point de coordonn&eacute;es (1, 1) se trouve au coin en haut &agrave; droite. Il est possible de donner 
des coordonn&eacute;es inf&eacute;rieures &agrave; z&eacute;ro ou sup&eacute;rieure &agrave; 1. La texture se r&eacute;p&egrave;te &agrave; l'infini dans toutes les directions.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_08.gif" width="75" height="143" alt="" />
Dans le cas d'un Multi-mat&eacute;riau, cette boite permet de filtrer les polygones en fonction de leur Material ID. Lorqu'il y a de nombreux sous-mat&eacute;riaux, l'affichage serait rapidement embrouillant.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_09.gif" width="95" height="29" alt="" />
Ce sont les fonctions habituelles qui permettent de se d&eacute;placer ou zoomer dans la fen&ecirc;tre.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_10.gif" width="24" height="26" alt="" />
<b>Pixel Snap</b>. Quand ce bouton est actif, le d&eacute;placement des points sur la textures force leur calage pr&eacute;cis sur un pixel de la texture.</p>
<p><img style="border:1px solid black" src="../images/tuts/bases/unwrapuvw_11.gif" width="347" height="299" alt="" />
Par d&eacute;faut, les lignes et points apparaissent en blanc, les points s&eacute;lectionn&eacute;s en rouge. Afin d'am&eacute;liorer la visibilit&eacute;, si la texture de fond
est blanche par exemple, il est possible de modifier ces couleurs dans la fen&ecirc;tre des options en cliquant sur le carr&eacute; de couleur. Ici, le blanc est remplac&eacute; par du bleu.</p>
<p class="link1">3.4 - Conclusion et r&eacute;sum&eacute;</p>
<p>Lorsque je souhaite appliquer une texture sur une partie d'un objet, j'utilise un modificateur <b>Edit Mesh</b>, je s&eacute;lectionne les polygones sur lesquels 
je veux travailler, je cr&eacute;e un nouveau mat&eacute;riau si celui-ci n'existe pas d&eacute;j&agrave; ou, dans le cas contraire, j'affecte un <b>Material ID</b> 
pour les polygones s&eacute;lectionn&eacute;s.</p>
<p>J'applique un modificateur <b>UVW Map</b> pour projeter le mat&eacute;riau sur mes polygones.</p>
<p>J'applique un modificateur <b>Unwrap UVW</b> pour editer le mapping et coller finement ma texture sur les polygones.</p>
</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 15 Octobre 2005<br />
&nbsp;</p>
</body></html>
