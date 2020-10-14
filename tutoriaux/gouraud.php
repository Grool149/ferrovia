<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - L'ombrage de Gouraud</title>
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
<p class="titre">L'ombrage de Gouraud</p>
<p>Pour repr&eacute;senter un objet 3D &agrave; l'&eacute;cran, un ordinateur calcule la position des sommets qui le composent dans le rep�re de la cam�ra
et effectue une projection conique afin d'obtenir leurs coordonn�es 2D sur l'�cran. Ensuite il remplit les triangles qui relient ces sommets. 
Pour cela, il prendra en compte les propri�t�s de couleur de l'objet (couleur diffuse ou texture appliqu&eacute;e sur l'objet). 
Cependant, le rendu de l'objet sera tr&egrave;s plat.</p>
<p>Exemple, une th&eacute;i&egrave;re de couleur uniforme grise. Tous les points ont la m&ecirc;me couleur, il n'y a aucun effet de 3D.</p>
<p><img src="../images/tuts/bases/gouraud_01.jpg" width="529" height="342" alt="" style="border:1px solid black" /></p>
<p>En ajoutant un ombrage, les volumes apparaissent tout de suite.</p>
<p><img src="../images/tuts/bases/gouraud_02.jpg" width="529" height="342" alt="" style="border:1px solid black" /></p>
<p>L'ombrage de Gouraud est une technique d'<a href="https://fr.wikipedia.org/wiki/Illumination_locale" class="link1">illumination locale</a>, qui se base sur la lumi&egrave;re incidente. 
Une source de lumi&egrave;re est d&eacute;finie (Dans le cas de MSTS, c'est tout simplement le soleil), l'angle entre la lumi&egrave;re et la normale de chaque vertex permet de calculer le taux de lumi&egrave;re 
r&eacute;fl&eacute;chie en chaque point de l'objet. Ce taux va pond&eacute;rer la couleur de base de la th&eacute;i&egrave;re. Le gris uniforme sera 
alors plus fonc&eacute; l� o� lumi�re a un angle d'incidence faible.</p>
<p>Contrairement � ce que son nom laisse penser, l'ombrage ne permet pas de calculer des ombres port�es d'un objet vers un autre.</p>
<p class="soustitre">Comment fonctionne l'ombrage de Gouraud</p>
<p>L'id�e de moduler la couleur d'un polygone en fonction de l'angle de la lumi�re incidente ne date pas de Gouraud. On parle d'ailleurs de mod�le de Lambert.
A l'heure des tous premiers syst�mes de repr�sentations 3D dans les ann�es 70, les capacit�s de calculs �taient tr�s limit�es et cette m�thode pr�sente l'int�r�t de 
reposer sur un simple produit scalaire entre deux vecteurs 3D. Le premier mod�le d'ombrage r�alisait cependant ce calcul au niveau du triangle et tous les pixels
d'un triangle avaient la m�me couleur. On parle de "Flat shading" (ombrage plat) et les diff�rences de couleurs entre des triangles accol�s mais non coplanaires
n'�taient pas tr�s agr�ables � voir, en raison de l'accentuation du constraste que le cerveau humain r�alise automatiquement (voir <a href="https://fr.wikipedia.org/wiki/Bandes_de_Mach" class="link1">Bandes de Mach</a>).</p>
<p>L'id�e d'Henri Gouraud est alors de calculer l'illumination, non pas au niveau du triangle, mais de chaque vertex. Puis d'interpoler lin�airement les valeurs obtenues sur chaque pixel lors du remplissage. La
diff�rence de teintes s'estompe le long d'une ar�te si les triangles accol�s utilisent les m�mes normales sur leurs vertices en commun. On parle alors de "Smooth shading" (ombrage liss�).</p>
<p>Le Smooth shading prendra plus tard le nom de Gouraud pour le distinguer d'autres techniques plus avanc�es telles que le mod�le d'illumination de Phong 
(voir <a href="https://fr.wikipedia.org/wiki/Ombrage_de_Phong" class="link1">ombrage de Bui Tuong Phong</a>).</p>
<p>L'ombrage de Gouraud devint tr�s populaire en raison de la simplicit� et donc de la rapidit� des calculs � r�aliser. Ils s'int�grent dans le placage lin�aire des textures. En 3D temps r�el, la recherche de
performance a longtemps privil�gi� ce mod�le sur tous les autres, trop co�teux. 30 ans apr�s, DirectX 9 ne proposait toujours que le flat shading et l'ombrage de Gouraud par d�faut. Il aura fallu attendre les Pixel shaders et les
cartes vid�os modernes pour permettre de passer � des mod�les plus �volu�s (Phong, Blinn...) gr�ce au per-pixel shading. L'illumination n'�tant plus calcul�e sur les vertices mais sur chaque pixel.</p>
<p>L'inconv�nient principal de l'ombrage de Gouraud est qu'il n'est efficace que pour repr�senter la lumi�re diffuse. La lumi�re sp�culaire, dont les reflets sont plus localis�s n'est pas bien rendue. Les techniques
plus modernes de Bump mapping � l'aide de cartes de normales (Normal map) font �galement pr�f�rer le per-pixel shading. Les logiciels d'images de synth�se pr�calcul�es utilisent d�sormais des techniques
d'<a href="https://fr.wikipedia.org/wiki/Illumination_globale" class="link1">illumination globale</a>, bien trop co�teuses en temps de calcul pour le jeu vid�o, qui s'approchent davantage du comportement physique des photons (Photonique, Radiosit�).</p>
<p class="soustitre">L'ombrage de Gouraud expliqu� par Gouraud</p>
<p>Le 23 juin 2011, la conf�rence <a class="link1" href="http://media.siggraph.org/paris/le_futur_a_un_passe/">"Le Futur a un Pass�"</a> se tenait � l'�cole nationale sup�rieure des Arts D�coratifs. 
Parmi les invit�s, Henri Gouraud raconte, non sans humour, comment il a atterri dans l'universit� d'Utah
au milieu des pionniers de l'image de synth�se et a invent� sa technique. Une toute b�te interpolation lin�aire dont il n'imaginait pas la port�e.<br />
<a class="link1" href="http://media.siggraph.org/paris/le_futur_a_un_passe/Gouraud.html">Henri Gouraud : La baguette magique qui cache la facette</a></p>
</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 15 Octobre 2005<br />
Mise � jour : 11 Mai 2016<br />
&nbsp;</p>
</body></html>
