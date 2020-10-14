<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Maillage 3D</title>
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
<span class="soustitre">Le maillage</span></p>
<p class="titre2">Géométrie 3D</p>
<p>Pour représenter un objet en trois dimensions, il faut définir la forme de son enveloppe extérieure.
C'est ce pourquoi la géométrie fut inventée du temps de la Grèce antique. Depuis, les progrès des mathématiques
nous ont permis d'exprimer des formes assez complexes sous forme d'équations.</p>
<p>Cette représentation exacte reste nécessaire pour les logiciels de CAO (Conception Assistée par Ordinateur). Les bureaux d'études ont besoin d'accéder à chacun des 
paramètre de ces équations pour dessiner, puis fabriquer un objet. Mais ils ont aussi besoin de la définition exacte d'une
surface pour calculer correctement des intersections ou lancer des simulations de dynamique, de thermique, de mécanique des fluides ...etc.</p>
<p class="titre2">3D temps réel</p>
<p>Les logiciels 3D temps réel et les moteurs de jeu vidéo sont en revanche extrèmement contraints par des soucis de performance. 
Il faut en effet calculer au moins 25 images par secondes pour que la persistence rétinienne nous donne l'illusion d'un mouvement fluide.
Les surfaces sont donc discrétisées, c'est à dire découpées en facettes planes dont la taille et le nombre seront déterminés pour 
obtenir un bon compromis entre réalisme et performances.</p>
<p>Ci-dessous, la théière d'Utah, dont les surfaces théoriques ont été discrétisées avec 2, 5 ou 10 segments :</p>
<p><img src="../images/tuts/discretisation.jpg" alt="discretisation" /></p>
<p><span class="link1">Nota</span> : ces images laissent songer que la théière a été découpée en morceaux quadrangulaires. Mais il faut bien se rappeler que, dans l'espace 3D, quatre points ne sont pas toujours
dans le même plan. La surface est donc découpée en triangles. Pour des raisons de lisibilité, les logiciels de modelage effacent
certaines arêtes. Voici le maillage quand toutes les arêtes sont affichées :</p>
<p><img src="../images/tuts/triangles.gif" alt="triangles" /></p>
<p>L'ensemble de ces triangles forme un maillage, ou maille. Mais, le nom anglais de <span class="link1">Mesh</span> est plus souvent utilisé. Chaque triangle est formé de trois sommets, les <span class="link1">Vertices</span>.
Et chaque vertex peut appartenir à un ou plusieurs triangles juxtaposés. Le maillage des Vertices en triangles est déterminé par les <span class="link1">Indices</span>.</p>
<p><a href="vertices.php" class="link1">Voyons maintenant comment tout cela est codé dans l'ordinateur</a>.</p>
</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 02 Septembre 2016<br />
&nbsp;</p>
</body></html>