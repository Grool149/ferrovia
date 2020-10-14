<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Techniques avanc�es MSTS</title>
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
<p class="titre">Fonctions avanc�es</p>
<p>Microsoft Train Simulator poss�de de nombreuses fonctions avanc�es peu connues car elles n'�taient pas document�es et peu voire pas du tout utilis�es 
par le contenu fourni avec le jeu.<br />
Certaines de ces fonctionnalit�s sont m�me buggu�es, ce qui forc� les d�veloppeurs de Kuju � les mettre en sommeil. Plusieurs amateurs ind�pendants ont
n�anmoins r�ussi, � force d'exp�rimentation � d�busquer quelques fonctions utiles et m�me � modifier le code de MSTS pour exploiter ces
fonctions m�connues (cf MSTS BinPatch).</p>

<p>Cet article se limitera aux possibilit�s permises par le format de repr�sentation de la 3D, des techniques d'illumination et d'application de textures.</p>
<p class="titre2">Les shaders</p>
<p>C'est quoi un shader? et bien c'est ce qui d�fini le comportement d'un mat�riau. En particulier, si ce mat�riau utilise des textures, comment il r�agit
� la lumi�re, s'il en �met lui-m�me, comment ce mat�riau doit �tre m�lang� avec les objets qui sont derri�re lui, comment les textures doivent �tre filtr�es
pour �tre correctement affich�es � l'�cran.</p>
<p>L'�crasante majorit� du mat�riel roulant fourni avec MSTS n'utilise que deux shaders : TexDiff et BlendATexDiff. Le premier poss�de une texture et r�agit
� la lumi�re diffuse. Le second poss�de les m�mes caract�ristiques mais, en plus, permet un m�lange avec une couche Alpha. Ensuite, MSTS propose
diff�rents comportements optionnels qui modifient la r�flexion sp�culaire et l'auto-luminescence d'un objet.</p>
<p>Explication de texte :<br />
Dans un moteur 3D temps r�el, il n'est pas possible de calculer le comportement r�el de la lumi�re. L'illumination d'une sc�ne r�elle tient compte
de la diffusion d'un tr�s grand nombre de photons qui subissent des r�flexions, r�fractions, diffractions et absorptions. Lesquelles seraient
bien trop longues � calculer, m�me en approximation. Un moteur 3D temps r�el utilise donc des parades cens�es imiter tr�s grossi�rement le comportement de la
lumi�re. Le mod�le d'illumination des objets utilise plusieurs types de lumi�re : Ambiente, Diffuse, Sp�culaire. 
Ambiente, la plus basique, est une lumi�re g�n�ralis�e, sans source particuli�re, valable dans toutes les directions et pour tous les objets. 
Elle ne permet pas de rendre correctement l'effet 3D, puisque qu'un objet de couleur uniforme n'appara�tra que comme une t�che plate de cette couleur.<br />
La lumi�re Diffuse est �mise par une source de lumi�re (Dans MSTS, cela peut �tre le Soleil ou les phares d'une locomotive). C'est une lumi�re
r�fl�chie dans toutes les directions avec la m�me intensit�. Pour reprendre l'exemple d'un objet de couleur uniforme, il appara�tra plus clair
du c�t� de la source lumineuse et plus fonc� � l'oppos�. Cependant, cette couleur ne d�pend que de la position de la source de lumi�re par rapport � l'objet.
Elle ne d�pend pas du tout de la position de l'observateur. En clair, si l'observateur se d�place tout autour de l'objet, celui-ci ne change pas de couleur.<br />
La lumi�re Sp�culaire est �galement �mise par une source mais sa r�flexion n'est pas homog�ne, elle d�pend du mat�riau et a une direction de r�flexion
privil�gi�e. D�s lors, la couleur d'un objet d�pend de la position de la source de lumi�re par rapport � cet objet mais aussi de la position de l'observateur.</p>
<p>Quelques exemples : prenons un corps c�leste tel que la Lune. Elle est �clair�e par le Soleil sur une face tandis que l'autre est dans l'obscurit� totale. 
Cela peut �tre simul� par une source de lumi�re diffuse et une lumi�re Ambiente � z�ro.<br />
En revanche, dans une sc�ne se d�roulant sur Terre, en plein jour, l'atmosph�re diffuse la lumi�re dans toutes les directions. De m�me,
si l'on se place � l'int�rieur d'une pi�ce, la lumi�re provenant par une fen�tre se r�fl�chit sur les murs et nous ne sommes pas dans l'obscurit� totale. La composante Ambiente doit donc �tre finement r�gl�e pour donner l'illusion de toutes
ces r�flexions sans devoir les calculer.<br />
Enfin, prenons une sc�ne ensoleil�e, une voie ferr�e, ballast, traverses et files de rail bien polies sur lesquelles
arrive une locomotive bien propre. Les pi�ces m�talliques et les vitres de la locomotive seront brillantes et l'observateur verra des reflets 
particuli�rment vifs s'il se met dans l'axe de la lumi�re incidente du soleil. C'est le comportement de r�flexion sp�culaire qui permettra de reproduire
des mat�riaux brillants ou mats.</p>

</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 18 Avril 2016<br />
&nbsp;</p>
</body></html>