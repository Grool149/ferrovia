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
<p class="titre">La repr�sentation d'un objet en trois dimensions<br />
<span class="soustitre">Vertices et Indices</span></p>
<p class="titre2">Le vertex</p>
<p>Un vertex contient plusieurs informations :<br />
- Un point g�om�trique<br />
- Un vecteur normal<br />
- Une ou plusieurs couleurs<br />
- Des coordonn�es de textures<br />
- ...</p>
<p class="link1">Le point g�om�trique</p>
<p>Le Point g�om�trique est un triplet de trois coordonn�es spatiales (X, Y, Z). Les valeurs de X, Y et Z sont d�finies dans le rep�re local de l'objet.
Comme l'objet sera pos� dans une sc�ne, et qu'il pourra m�me �tre anim�, les coordonn�es seront recalcul�es � chaque image dans le rep�re Monde de la sc�ne.
Le but restant d'afficher notre objet � l'�cran, une derni�re op�ration consistera � calculer la position de nos vertices dans l'espace de la cam�ra, par une projection conique. Tous ces calculs seront
r�alis�s, pour chaque objet et � chaque image, dans une �tape qui s'appelle la Transformation.</p>
<p class="link1">Le vecteur normal</p>
<p>Le vecteur normal est un vecteur unitaire perpendiculaire � la surface. Ce vecteur servira � l'�clairage de la mesh.</p>
<p class="legende"><img src="../images/tuts/normale.gif" alt="normale" /><br />
Exemple de facette triangulaire. Avec la repr�sentation de la normale d'un vertex.</p>
<p>&nbsp;&nbsp;&rarr;<br />
||N|| = 1 ; Un vecteur normal est un vecteur unitaire => sa norme vaut 1. Ceci est tr�s important pour les calculs de produit scalaire.</p>
<p style="text-decoration: underline;">Deux remarques : </p>
<p>- ce vecteur n'est pas forc�ment �gal au vecteur normal du triangle auquel le vertex appartient. En effet, le vertex peut appartenir � plusieurs triangles juxtapos�s mais non coplanaires. En g�n�ral, les logiciels
de mod�lisation calculent la normale de chaque triangle puis font la moyenne des normales de tous les triangles auxquels un vertex appartient.</p>
<p class="legende"><img src="../images/tuts/normale_moy.gif" alt="normale moyenne" /><br />
Exemple : cinq facettes ont un vertex en commun. La normale du vertex est la moyenne des normales des cinq triangles.</p>
<p>- au contraire, on peut souhaiter qu'un sommet poss�de des normales diff�rentes pour repr�senter un coin anguleux. Dans ce cas, il y aura plusieurs vertices diff�rents. Ils auront un seul point g�om�trique en commun (et seront confondus dans l'espace) mais chacun aura un vecteur normal propre.</p>
<p class="legende"><img src="../images/tuts/vertices_multiple.gif" alt="vertices multiple" /><br />
Exemple : le coin de ce Parall�l�pip�de est form� de trois vertices ayant la m�me position spatiale.</p>
<p class="link1">Les couleurs</p>
<p>Un vertex poss�de une ou plusieurs couleurs. Celle-ci r�agissent � plusieurs types de lumi�re (ambiante, diffuse...). Ce param�tre n'est cependant pas souvent utilis�, et remplac� par le placage de texture.</p>
<p class="link1">Les coordonn�es de textures</p>
<p>Une texture se pr�sente comme une image en deux dimensions que l'on va appliquer sur la surface 3D de la m�me fa�on que l'on collerait du papier peint.
DirectX permet d'appliquer jusque huit textures sur une surface et chaque vertex poss�de entre z�ro et huit jeux de coordonn�es � deux dimensions UV. Les coordonn�es sont exprim�es dans le rep�re de la texture.
L'origine (0.0f , 0.0f) se situe en haut � gauche. La composante U indique l'abscisse vers la droite. La composante V indique l'ordonn�e vers le bas. Le coin en bas � droite a pour coordonn�es (1.0f, 1.0f). (le "f" signifiant qu'il
s'agit de nombres � virgule flottante). Les coordonn�es de texture d'un vertex peuvent n�anmoins sortir de l'intervalle [0.0f , 1.0f]. Dans ce cas, DirectX propose diff�rents modes. Le plus courant �tant la r�p�tition � l'infini
de la texture.</p>
<p class="legende"><img src="../images/tuts/espace_texel.jpg" alt="espace texel" /><br />
L'espace de la texture.</p>
<p class="link1">Autres champs et d�finition de vertex</p>
<p>Le contenu d'un vertex est variable puisqu'il contient des champs optionnels. Comme cela vient d'�tre dit, il peut contenir plusieurs coordonn�es de texture. Il peut aussi contenir un vecteur tangente qui sera utile pour des techniques avanc�es comme le Normal Bump Mapping.
Depuis le support des "Vertex Shaders", les d�veloppeurs peuvent m�me ajouter des donn�es personnalis�es qui seront utilis�es pour divers effets. 
La carte graphique a besoin de savoir comment interpr�ter les donn�es enregistr�es dans un vertex. C'est le r�le de la d�finition de vertex. Gr�ce � elle, on connait la taille d'un vertex en m�moire, et l'ordre des informations 
qu'il contient. Un objet 3D peut �tre divis� en plusieurs sous-objets qui auront des caract�ristiques diff�rentes. On les appelle des primitives. Chaque primitive poss�de sa d�finition de vertex.</p>
<p class="titre2">Le Vextex Buffer</p>
<p>Tous les vertices d'une primitive sont rang�s dans un tableau, le Vertex Buffer. Ce tableau est envoy� directement dans la m�moire vid�o. La d�finition de vertex de la primitive permet de retrouver chaque information
de position, de normale, de texture � sa place.</p>
<p class="titre2">L'Index Buffer</p>
<p>La carte graphique a besoin de savoir comment associer les vertices pour construire les triangles. Le rang d'un vertex dans le Vertex Buffer est son indice.
L'Index Buffer est un tableau, envoy� directement dans la m�moire vid�o, qui contient une liste d'indices servant de guide de reconstruction. Les indices peuvent �tre class�s
selon trois modes :<br />
- List : chaque triangle est d�fini par une suite de trois indices.<br />
- Strip (pellicule) : Le premier triangle est d�fini par trois indices, les suivants n'ont besoin que d'un seul indice et utilisent un c�t� du triangle pr�c�dement construit.<br />
- Fan (�vantail) : Le premier indice est le centre de l'�ventail, les indices suivants permettent de reconstruire l'�ventail.</p>
<p>La carte graphique sait comment construire les surfaces d'une primitive. <a href="transformation.php" class="link1">Il faut maintenant l'afficher � l'�cran</a>.</p>
</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 02 Septembre 2016<br />
&nbsp;</p>
</body></html>
