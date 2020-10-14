<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Vertices et Indices</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../ferrovia.ico" type="image/bmp" />
<link rel="stylesheet" href="../miseenpage.css" />
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
<p class="titre">La représentation d'un objet en trois dimensions<br />
<span class="soustitre">Vertices et Indices</span></p>
<p class="titre2">Le vertex</p>
<p>Un vertex contient plusieurs informations :<br />
- Un point géométrique<br />
- Un vecteur normal<br />
- Une ou plusieurs couleurs<br />
- Des coordonnées de textures<br />
- ...</p>
<p class="link1">Le point géométrique</p>
<p>Le Point géométrique est un triplet de trois coordonnées spatiales (X, Y, Z). Les valeurs de X, Y et Z sont définies dans le repère local de l'objet.
Comme l'objet sera posé dans une scène, et qu'il pourra même être animé, les coordonnées seront recalculées à chaque image dans le repère Monde de la scène.
Le but restant d'afficher notre objet à l'écran, une dernière opération consistera à calculer la position de nos vertices dans l'espace de la caméra, par une projection conique. Tous ces calculs seront
réalisés, pour chaque objet et à chaque image, dans une étape qui s'appelle la Transformation.</p>
<p class="link1">Le vecteur normal</p>
<p>Le vecteur normal est un vecteur unitaire perpendiculaire à la surface. Ce vecteur servira à l'éclairage de la mesh.</p>
<p class="legende"><img src="../images/tuts/normale.gif" alt="normale" /><br />
Exemple de facette triangulaire. Avec la représentation de la normale d'un vertex.</p>
<p>&nbsp;&nbsp;&rarr;<br />
||N|| = 1 ; Un vecteur normal est un vecteur unitaire => sa norme vaut 1. Ceci est très important pour les calculs de produit scalaire.</p>
<p style="text-decoration: underline;">Deux remarques : </p>
<p>- ce vecteur n'est pas forcément égal au vecteur normal du triangle auquel le vertex appartient. En effet, le vertex peut appartenir à plusieurs triangles juxtaposés mais non coplanaires. En général, les logiciels
de modélisation calculent la normale de chaque triangle puis font la moyenne des normales de tous les triangles auxquels un vertex appartient.</p>
<p class="legende"><img src="../images/tuts/normale_moy.gif" alt="normale moyenne" /><br />
Exemple : cinq facettes ont un vertex en commun. La normale du vertex est la moyenne des normales des cinq triangles.</p>
<p>- au contraire, on peut souhaiter qu'un sommet possède des normales différentes pour représenter un coin anguleux. Dans ce cas, il y aura plusieurs vertices différents. Ils auront un seul point géométrique en commun (et seront confondus dans l'espace) mais chacun aura un vecteur normal propre.</p>
<p class="legende"><img src="../images/tuts/vertices_multiple.gif" alt="vertices multiple" /><br />
Exemple : le coin de ce Parallélépipède est formé de trois vertices ayant la même position spatiale.</p>
<p class="link1">Les couleurs</p>
<p>Un vertex possède une ou plusieurs couleurs. Celle-ci réagissent à plusieurs types de lumière (ambiante, diffuse...). Ce paramètre n'est cependant pas souvent utilisé, et remplacé par le placage de texture.</p>
<p class="link1">Les coordonnées de textures</p>
<p>Une texture se présente comme une image en deux dimensions que l'on va appliquer sur la surface 3D de la même façon que l'on collerait du papier peint.
DirectX permet d'appliquer jusque huit textures sur une surface et chaque vertex possède entre zéro et huit jeux de coordonnées à deux dimensions UV. Les coordonnées sont exprimées dans le repère de la texture.
L'origine (0.0f , 0.0f) se situe en haut à gauche. La composante U indique l'abscisse vers la droite. La composante V indique l'ordonnée vers le bas. Le coin en bas à droite a pour coordonnées (1.0f, 1.0f). (le "f" signifiant qu'il
s'agit de nombres à virgule flottante). Les coordonnées de texture d'un vertex peuvent néanmoins sortir de l'intervalle [0.0f , 1.0f]. Dans ce cas, DirectX propose différents modes. Le plus courant étant la répétition à l'infini
de la texture.</p>
<p class="legende"><img src="../images/tuts/espace_texel.jpg" alt="espace texel" /><br />
L'espace de la texture.</p>
<p class="link1">Autres champs et définition de vertex</p>
<p>Le contenu d'un vertex est variable puisqu'il contient des champs optionnels. Comme cela vient d'être dit, il peut contenir plusieurs coordonnées de texture. Il peut aussi contenir un vecteur tangente qui sera utile pour des techniques avancées comme le Normal Bump Mapping.
Depuis le support des "Vertex Shaders", les développeurs peuvent même ajouter des données personnalisées qui seront utilisées pour divers effets. 
La carte graphique a besoin de savoir comment interpréter les données enregistrées dans un vertex. C'est le rôle de la définition de vertex. Grâce à elle, on connait la taille d'un vertex en mémoire, et l'ordre des informations 
qu'il contient. Un objet 3D peut être divisé en plusieurs sous-objets qui auront des caractéristiques différentes. On les appelle des primitives. Chaque primitive possède sa définition de vertex.</p>
<p class="titre2">Le Vextex Buffer</p>
<p>Tous les vertices d'une primitive sont rangés dans un tableau, le Vertex Buffer. Ce tableau est envoyé directement dans la mémoire vidéo. La définition de vertex de la primitive permet de retrouver chaque information
de position, de normale, de texture à sa place.</p>
<p class="titre2">L'Index Buffer</p>
<p>La carte graphique a besoin de savoir comment associer les vertices pour construire les triangles. Le rang d'un vertex dans le Vertex Buffer est son indice.
L'Index Buffer est un tableau, envoyé directement dans la mémoire vidéo, qui contient une liste d'indices servant de guide de reconstruction. Les indices peuvent être classés
selon trois modes :<br />
- List : chaque triangle est défini par une suite de trois indices.<br />
- Strip (pellicule) : Le premier triangle est défini par trois indices, les suivants n'ont besoin que d'un seul indice et utilisent un côté du triangle précédement construit.<br />
- Fan (évantail) : Le premier indice est le centre de l'éventail, les indices suivants permettent de reconstruire l'éventail.</p>
<p>La carte graphique sait comment construire les surfaces d'une primitive. <a href="transformation.php" class="link1">Il faut maintenant l'afficher à l'écran</a>.</p>
</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 02 Septembre 2016<br />
&nbsp;</p>
</body></html>
