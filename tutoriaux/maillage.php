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
<p class="titre">La repr�sentation d'un objet en trois dimensions<br />
<span class="soustitre">Le maillage</span></p>
<p class="titre2">G�om�trie 3D</p>
<p>Pour repr�senter un objet en trois dimensions, il faut d�finir la forme de son enveloppe ext�rieure.
C'est ce pourquoi la g�om�trie fut invent�e du temps de la Gr�ce antique. Depuis, les progr�s des math�matiques
nous ont permis d'exprimer des formes assez complexes sous forme d'�quations.</p>
<p>Cette repr�sentation exacte reste n�cessaire pour les logiciels de CAO (Conception Assist�e par Ordinateur). Les bureaux d'�tudes ont besoin d'acc�der � chacun des 
param�tre de ces �quations pour dessiner, puis fabriquer un objet. Mais ils ont aussi besoin de la d�finition exacte d'une
surface pour calculer correctement des intersections ou lancer des simulations de dynamique, de thermique, de m�canique des fluides ...etc.</p>
<p class="titre2">3D temps r�el</p>
<p>Les logiciels 3D temps r�el et les moteurs de jeu vid�o sont en revanche extr�mement contraints par des soucis de performance. 
Il faut en effet calculer au moins 25 images par secondes pour que la persistence r�tinienne nous donne l'illusion d'un mouvement fluide.
Les surfaces sont donc discr�tis�es, c'est � dire d�coup�es en facettes planes dont la taille et le nombre seront d�termin�s pour 
obtenir un bon compromis entre r�alisme et performances.</p>
<p>Ci-dessous, la th�i�re d'Utah, dont les surfaces th�oriques ont �t� discr�tis�es avec 2, 5 ou 10 segments :</p>
<p><img src="../images/tuts/discretisation.jpg" alt="discretisation" /></p>
<p><span class="link1">Nota</span> : ces images laissent songer que la th�i�re a �t� d�coup�e en morceaux quadrangulaires. Mais il faut bien se rappeler que, dans l'espace 3D, quatre points ne sont pas toujours
dans le m�me plan. La surface est donc d�coup�e en triangles. Pour des raisons de lisibilit�, les logiciels de modelage effacent
certaines ar�tes. Voici le maillage quand toutes les ar�tes sont affich�es :</p>
<p><img src="../images/tuts/triangles.gif" alt="triangles" /></p>
<p>L'ensemble de ces triangles forme un maillage, ou maille. Mais, le nom anglais de <span class="link1">Mesh</span> est plus souvent utilis�. Chaque triangle est form� de trois sommets, les <span class="link1">Vertices</span>.
Et chaque vertex peut appartenir � un ou plusieurs triangles juxtapos�s. Le maillage des Vertices en triangles est d�termin� par les <span class="link1">Indices</span>.</p>
<p><a href="vertices.php" class="link1">Voyons maintenant comment tout cela est cod� dans l'ordinateur</a>.</p>
</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 02 Septembre 2016<br />
&nbsp;</p>
</body></html>