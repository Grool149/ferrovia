<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Les shaders MSTS</title>
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
<p class="titre">Les shaders MSTS</p>
<p class="titre2">Un shader, c'est quoi?</p>
<p>C'est ce qui d�fini le comportement d'un mat�riau. En particulier, si ce mat�riau utilise z�ro, une ou plusieurs textures, comment il r�agit
� la lumi�re, s'il en �met lui-m�me, comment ce mat�riau doit �tre m�lang� avec les objets qui sont derri�re lui, comment les textures doivent �tre filtr�es
pour �tre correctement affich�es � l'�cran.</p>
<p>L'�crasante majorit� du mat�riel roulant fourni avec MSTS n'utilise que deux shaders : <span class="link1">TexDiff</span> et <span class="link1">BlendATexDiff</span>. Le premier poss�de une texture et r�agit
� la lumi�re diffuse. Le second poss�de les m�mes caract�ristiques mais, en plus, permet un m�lange avec une couche Alpha. Ensuite, MSTS propose
diff�rents comportements optionnels (la Lighting palette) qui modifient la r�flexion sp�culaire et l'auto-luminescence d'un objet.</p>
<p>Ouh la la! Ca veut dire quoi?</p>
<p class="titre2">Simuler la lumi�re en 3D temps r�el</p>
<p>Dans un moteur 3D temps r�el, il n'est pas possible de calculer le comportement r�el de la lumi�re. L'illumination d'une sc�ne r�elle tient compte
de la diffusion d'un tr�s grand nombre de photons qui subissent des r�flexions, r�fractions, diffractions et absorptions. Lesquelles seraient
bien trop longues � calculer, m�me en approximation. Un moteur 3D temps r�el utilise donc des parades cens�es imiter tr�s grossi�rement le comportement de la
lumi�re. Le mod�le d'illumination des objets utilise plusieurs types de lumi�re : Ambiente, Diffuse, Sp�culaire.</p>
<p><ul><li>Ambiente, la plus basique, est une lumi�re g�n�ralis�e, sans source particuli�re, valable dans toutes les directions et pour tous les objets. 
Elle ne permet pas de rendre correctement un effet 3D, puisqu'un objet de couleur uniforme n'appara�tra que comme une t�che plate de cette couleur.</li>
<li>La lumi�re Diffuse est �mise par une source de lumi�re (en g�n�ral une source plac�e � l'infini et envoyant de la lumi�re dans une direction unique. Dans MSTS, cela peut �tre le Soleil ou les phares d'une locomotive).
La quantit� de lumi�re re�ue par un objet d�pend de son orientation par rapport � la source (cf <a href="#Lambert" class="link1">Le mod�le Lambertien</a>).
La lumi�re Diffuse est r�fl�chie dans toutes les directions avec la m�me intensit�. Pour reprendre l'exemple d'un objet de couleur uniforme, il appara�tra plus clair
du c�t� de la source lumineuse et plus fonc� � l'oppos�. Cependant, cette couleur ne d�pend que de la position de la source de lumi�re par rapport � l'objet.
Elle ne d�pend pas du tout de la position de l'observateur. En clair, si l'observateur se d�place tout autour de l'objet, celui-ci ne change pas de couleur.</li>
<li>La lumi�re Sp�culaire est �galement �mise par une source mais sa r�flexion n'est pas homog�ne, elle d�pend du mat�riau et a une direction de r�flexion
privil�gi�e. D�s lors, la couleur d'un objet d�pend de la position de la source de lumi�re par rapport � cet objet mais aussi de la position de l'observateur.</li></ul></p>
<p>Quelques exemples : prenons un corps c�leste tel que la Lune. Elle est �clair�e par le Soleil sur une face tandis que l'autre est dans l'obscurit� totale. 
Cela peut �tre simul� par une source de lumi�re Diffuse et une lumi�re Ambiente � z�ro.<br />
En revanche, dans une sc�ne se d�roulant sur Terre, en plein jour, l'atmosph�re diffuse la lumi�re dans toutes les directions. De m�me,
si l'on se place � l'int�rieur d'une pi�ce, la lumi�re provenant par une fen�tre se r�fl�chit sur les murs et nous ne sommes pas dans l'obscurit� totale. La composante Ambiente doit donc �tre finement r�gl�e pour donner l'illusion de toutes
ces r�flexions sans devoir les calculer.<br />
Enfin, prenons une sc�ne ensoleil�e, une voie ferr�e, le ballast, les traverses et des files de rail bien polies sur lesquelles
arrive une locomotive bien propre. Les files de rail, les pi�ces m�talliques et les vitres de la locomotive seront brillantes et l'observateur verra des reflets 
particuli�rment vifs s'il se met dans l'axe de la lumi�re incidente du soleil. C'est le comportement de r�flexion sp�culaire qui permettra de reproduire
des mat�riaux brillants ou mats.</p>
<p class="link1"><a name="Lambert">Le mod�le Lambertien</a></p>
Le mod�le Lambertien permet de calculer la quantit� de lumi�re re�ue par un objet. Il faut le distinguer ensuite des mod�les d'illumination (Gouraud ou Phong) qui permettent, � partir
de cette lumi�re re�ue, d'estimer la lumi�re r�fl�chie vers un observateur.<br />
Une facette triangulaire poss�de une direction normale, perpendiculaire au plan form� par la facette. Si cette normale fait un angle &theta; avec la direction de la lumi�re, 
la quantit� de lumi�re re�ue par la facette est proportionnelle au cosinus de &theta;. En d�terminant ces deux directions par des vecteurs unitaires, il suffit d'en faire le produit scalaire pour
conna�tre quantit� de lumi�re re�ue par la facette, exprim�e entre 0 et 1. Si la facette est orient�e vers la source lumineuse, cette quantit� sera 1. Si la facette est perpendiculaire � la direction
de la lumi�re, cette quantit� sera 0. Enfin, si la facette tourne le dos � la source, le produit scalaire donnera un r�sultat n�gatif qui est converti � z�ro.
<p class="link1">Le mod�le d'illumination de Gouraud</p>
<p>Plut�t que de faire le calcul au niveau de la facette, l'id�e d'Henri Gouraud fut de calculer l'intensit� lumineuse au niveau de chaque vertex, puis d'interpoler cette intensit� lin�airement sur la facette. 
Si bien que pour deux facettes qui poss�dent une ar�te (et donc deux vertices) en commun, le calcul de la couleur de l'ar�te donne le m�me r�sultat de part et d'autre, et l'ar�te dispara�t par simple illusion d'optique.
Chaque vertex poss�de donc un vecteur normal que l'on multiplie au vecteur de la lumi�re par produit scalaire. Puis ce produit est multipli� � la valeur de chaque canal de couleur R, V, B pour obtenir la valeur Diffuse du vertex.</p>
<p>Pour la valeur sp�culaire, il faut �galement prendre en compte que la lumi�re re�ue selon un angle &theta; est principalement r�fl�chie sym�triquement (avec un angle -&theta;). Un produit scalaire entre la direction de la 
lumi�re r�fl�chie et l'axe du vertex � l'observateur permet de calculer l'�clat sp�culaire qui est ajout� � la couleur Diffuse.</p>
<p class="titre2">La couche Alpha</p>
<p>Une texture utilise une image d�compos�e en Texels (Texture Element). Chacun de ces texels repr�sente un point et peut �tre cod� sur 24 ou 32 bits d'information.
En 24 bits, un texel poss�de trois canaux de couleurs (Rouge, Vert, Bleu) cod�s chacun sur 8 bits, ce qui permet 256 niveaux. La combinaison
de ces trois canaux permet de reproduire 256 puissance 3, soit environ 16,7 millions de couleurs. En 32 bits, un texel poss�de un quatri�me canal, dit
couche Alpha, �galement cod� sur 8 bits. Cette couche apporte une information suppl�mentaire qui peut �tre utilis�e de fa�on diff�rente en fonction
du shader. En g�n�ral, dans Train Simulator, la couche Alpha sert � exprimer l'opacit� de la texture. A z�ro, la texture sera absolument transparente, �
255, la texture sera absolument opaque.</p>
<p>NOTA : Il faut faire attention au fait que MSTS d�grade la qualit� des textures. Des 32 bits originels, il d�grade la qualit� � 16 bits
pour les objets recevant un mat�riau qui utilise la transparence Alpha. D�s lors, seuls 4 bits servent au niveau de transparence, et 12 bits pour la couleur.
L'interpolation r�alis�e par MSTS n'est pas lin�aire et peut provoquer des artefacs dans les d�grad�s de couleurs. Il convient de faire des essais.
Cette limitation peut �tre contourn�e en utilisant des formats de textures compress�es directement lisibles par les cartes graphiques (format DXT3).
Open Rails ne pr�sente pas cette limitation.</p>
<p class="titre2">Les shaders disponibles dans MSTS</p>
<p>Comme dit plus haut, deux shaders sont tr�s majoritairement utilis�s dans MSTS : <span class="link1">TexDiff</span> et <span class="link1">BlendATexDiff</span>.
Tous les deux sont sensibles � la lumi�re Ambiente et Diffuse et poss�dent une texture. BlendATexDiff exploite �galement
la couche alpha de la texture dans une op�ration de "Alpha Blending". C'est � dire que la valeur alpha sert � d�terminer l'opacit�
du mat�riau et sa couleur est alors m�lang�e avec l'arri�re plan. Dans ce cas, l'ordre d'affichage des facettes est important
puisque l'arri�re plan doit �tre calcul� avant. Un d�faut fr�quent dans les mod�les MSTS est que les facettes alpha ne sont pas tri�es
et que l'arri�re plan n'est pas dessin�.</p>
<p>Les autres shaders disponibles dans gmax sont : Diffuse (illumin�, sans texture. Utilise la couleur du mat�riau.), Tex (texture non illumin�e), 
BlendATex (texture non illumin�e et Alpha Blending), AddATex (texture non illumin�e et couche alpha utilis�e en addition), AddATexDiff 
(texture illumin�e et couche alpha utilis�e en addition)</p>
<p class="titre2">Lighting palette</p>
<p>Le param�tre de Lighting palette permet de pr�ciser le comportement du mat�riau vis-�-vis de la composante Sp�culaire. Au choix, le 
mat�riau sera mat, l�g�rement brillant, mat�riau tr�s brillant, faiblement auto-luminescent, fortement auto-luminescent, sombre.</p>
<p>Cependant, MSTS peut appliquer un grand nombre de shaders qui ne sont pas document�s et indisponibles dans les outils d'export tels
que le gamepack de gmax. Voir <a href="avance.php" class="link1">Techniques Avanc�es</a></p>
<p class="titre2">Les autres propri�t�s d'un mat�riau</p>
<p>Alpha test mode :</p>
<p>Si un mat�riau utilise le shader <span class="link1">BlendATexDiff</span>, la couche Alpha de la texture sera utilis�e pour donner une information de transparence.<br />
Deux choix se pr�sentent. Soit la texture utilisent les 256 niveaux de la couche Alpha pour reproduire un mat�riau plus ou moins opaque (Alpha test mode = none),
soit la transparence est du tout ou rien (Alpha test mode = trans).<br />
NOTA : dans le cas d'un mat�riau semi-transparent (Alpha test mode = none), il faut faire attention � la d�gradation de la qualit� des textures par MSTS.</p>
<p>Le Mip-map Bias :</p>
<p>Lorsque le moteur 3D applique une texture sur une facette, il effectue une op�ration de redimensionnement des texels et de filtrage lin�aire qui
peuvent cr�er des artefacts par effet de Moir�. Pour eviter ce probl�me, une texture poss�de plusieurs repr�sentations pr�filtr�es de son image.
Par exemple, une texture cr��e � partir d'une image de 512*512 pixels poss�dent �videmment une version 512*512, mais aussi des versions 256*256, 128*128, 64*64...
qui se subsituent � la version � haute r�solution si l'objet s'�loigne de la cam�ra. Ce m�canisme s'appelle le Mip-mapping. Probl�me, MSTS d�grade 
trop rapidement les textures du mat�riel roulant.<br />
Le Mip-map Bias permet de fixer un retard dans ce m�canisme en lui donnant une valeur n�gative. La valeur -3 donne de bons r�sultats.
<p>Z-Buffer mode</p>
<p>Filtrage</p>
</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 18 Avril 2016<br />
&nbsp;</p>
</body></html>