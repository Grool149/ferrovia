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
<p>C'est ce qui défini le comportement d'un matériau. En particulier, si ce matériau utilise zéro, une ou plusieurs textures, comment il réagit
à la lumière, s'il en émet lui-même, comment ce matériau doit être mélangé avec les objets qui sont derrière lui, comment les textures doivent être filtrées
pour être correctement affichées à l'écran.</p>
<p>L'écrasante majorité du matériel roulant fourni avec MSTS n'utilise que deux shaders : <span class="link1">TexDiff</span> et <span class="link1">BlendATexDiff</span>. Le premier possède une texture et réagit
à la lumière diffuse. Le second possède les mêmes caractéristiques mais, en plus, permet un mélange avec une couche Alpha. Ensuite, MSTS propose
différents comportements optionnels (la Lighting palette) qui modifient la réflexion spéculaire et l'auto-luminescence d'un objet.</p>
<p>Ouh la la! Ca veut dire quoi?</p>
<p class="titre2">Simuler la lumière en 3D temps réel</p>
<p>Dans un moteur 3D temps réel, il n'est pas possible de calculer le comportement réel de la lumière. L'illumination d'une scène réelle tient compte
de la diffusion d'un très grand nombre de photons qui subissent des réflexions, réfractions, diffractions et absorptions. Lesquelles seraient
bien trop longues à calculer, même en approximation. Un moteur 3D temps réel utilise donc des parades censées imiter très grossièrement le comportement de la
lumière. Le modèle d'illumination des objets utilise plusieurs types de lumière : Ambiente, Diffuse, Spéculaire.</p>
<p><ul><li>Ambiente, la plus basique, est une lumière généralisée, sans source particulière, valable dans toutes les directions et pour tous les objets. 
Elle ne permet pas de rendre correctement un effet 3D, puisqu'un objet de couleur uniforme n'apparaîtra que comme une tâche plate de cette couleur.</li>
<li>La lumière Diffuse est émise par une source de lumière (en général une source placée à l'infini et envoyant de la lumière dans une direction unique. Dans MSTS, cela peut être le Soleil ou les phares d'une locomotive).
La quantité de lumière reçue par un objet dépend de son orientation par rapport à la source (cf <a href="#Lambert" class="link1">Le modèle Lambertien</a>).
La lumière Diffuse est réfléchie dans toutes les directions avec la même intensité. Pour reprendre l'exemple d'un objet de couleur uniforme, il apparaîtra plus clair
du côté de la source lumineuse et plus foncé à l'opposé. Cependant, cette couleur ne dépend que de la position de la source de lumière par rapport à l'objet.
Elle ne dépend pas du tout de la position de l'observateur. En clair, si l'observateur se déplace tout autour de l'objet, celui-ci ne change pas de couleur.</li>
<li>La lumière Spéculaire est également émise par une source mais sa réflexion n'est pas homogène, elle dépend du matériau et a une direction de réflexion
privilégiée. Dès lors, la couleur d'un objet dépend de la position de la source de lumière par rapport à cet objet mais aussi de la position de l'observateur.</li></ul></p>
<p>Quelques exemples : prenons un corps céleste tel que la Lune. Elle est éclairée par le Soleil sur une face tandis que l'autre est dans l'obscurité totale. 
Cela peut être simulé par une source de lumière Diffuse et une lumière Ambiente à zéro.<br />
En revanche, dans une scène se déroulant sur Terre, en plein jour, l'atmosphère diffuse la lumière dans toutes les directions. De même,
si l'on se place à l'intérieur d'une pièce, la lumière provenant par une fenêtre se réfléchit sur les murs et nous ne sommes pas dans l'obscurité totale. La composante Ambiente doit donc être finement réglée pour donner l'illusion de toutes
ces réflexions sans devoir les calculer.<br />
Enfin, prenons une scéne ensoleilée, une voie ferrée, le ballast, les traverses et des files de rail bien polies sur lesquelles
arrive une locomotive bien propre. Les files de rail, les pièces métalliques et les vitres de la locomotive seront brillantes et l'observateur verra des reflets 
particulièrment vifs s'il se met dans l'axe de la lumière incidente du soleil. C'est le comportement de réflexion spéculaire qui permettra de reproduire
des matériaux brillants ou mats.</p>
<p class="link1"><a name="Lambert">Le modèle Lambertien</a></p>
Le modèle Lambertien permet de calculer la quantité de lumière reçue par un objet. Il faut le distinguer ensuite des modèles d'illumination (Gouraud ou Phong) qui permettent, à partir
de cette lumière reçue, d'estimer la lumière réfléchie vers un observateur.<br />
Une facette triangulaire possède une direction normale, perpendiculaire au plan formé par la facette. Si cette normale fait un angle &theta; avec la direction de la lumière, 
la quantité de lumière reçue par la facette est proportionnelle au cosinus de &theta;. En déterminant ces deux directions par des vecteurs unitaires, il suffit d'en faire le produit scalaire pour
connaître quantité de lumière reçue par la facette, exprimée entre 0 et 1. Si la facette est orientée vers la source lumineuse, cette quantité sera 1. Si la facette est perpendiculaire à la direction
de la lumière, cette quantité sera 0. Enfin, si la facette tourne le dos à la source, le produit scalaire donnera un résultat négatif qui est converti à zéro.
<p class="link1">Le modèle d'illumination de Gouraud</p>
<p>Plutôt que de faire le calcul au niveau de la facette, l'idée d'Henri Gouraud fut de calculer l'intensité lumineuse au niveau de chaque vertex, puis d'interpoler cette intensité linéairement sur la facette. 
Si bien que pour deux facettes qui possèdent une arête (et donc deux vertices) en commun, le calcul de la couleur de l'arête donne le même résultat de part et d'autre, et l'arête disparaît par simple illusion d'optique.
Chaque vertex possède donc un vecteur normal que l'on multiplie au vecteur de la lumière par produit scalaire. Puis ce produit est multiplié à la valeur de chaque canal de couleur R, V, B pour obtenir la valeur Diffuse du vertex.</p>
<p>Pour la valeur spéculaire, il faut également prendre en compte que la lumière reçue selon un angle &theta; est principalement réfléchie symétriquement (avec un angle -&theta;). Un produit scalaire entre la direction de la 
lumière réfléchie et l'axe du vertex à l'observateur permet de calculer l'éclat spéculaire qui est ajouté à la couleur Diffuse.</p>
<p class="titre2">La couche Alpha</p>
<p>Une texture utilise une image décomposée en Texels (Texture Element). Chacun de ces texels représente un point et peut être codé sur 24 ou 32 bits d'information.
En 24 bits, un texel possède trois canaux de couleurs (Rouge, Vert, Bleu) codés chacun sur 8 bits, ce qui permet 256 niveaux. La combinaison
de ces trois canaux permet de reproduire 256 puissance 3, soit environ 16,7 millions de couleurs. En 32 bits, un texel possède un quatrième canal, dit
couche Alpha, également codé sur 8 bits. Cette couche apporte une information supplémentaire qui peut être utilisée de façon différente en fonction
du shader. En général, dans Train Simulator, la couche Alpha sert à exprimer l'opacité de la texture. A zéro, la texture sera absolument transparente, à
255, la texture sera absolument opaque.</p>
<p>NOTA : Il faut faire attention au fait que MSTS dégrade la qualité des textures. Des 32 bits originels, il dégrade la qualité à 16 bits
pour les objets recevant un matériau qui utilise la transparence Alpha. Dés lors, seuls 4 bits servent au niveau de transparence, et 12 bits pour la couleur.
L'interpolation réalisée par MSTS n'est pas linéaire et peut provoquer des artefacs dans les dégradés de couleurs. Il convient de faire des essais.
Cette limitation peut être contournée en utilisant des formats de textures compressées directement lisibles par les cartes graphiques (format DXT3).
Open Rails ne présente pas cette limitation.</p>
<p class="titre2">Les shaders disponibles dans MSTS</p>
<p>Comme dit plus haut, deux shaders sont très majoritairement utilisés dans MSTS : <span class="link1">TexDiff</span> et <span class="link1">BlendATexDiff</span>.
Tous les deux sont sensibles à la lumière Ambiente et Diffuse et possèdent une texture. BlendATexDiff exploite également
la couche alpha de la texture dans une opération de "Alpha Blending". C'est à dire que la valeur alpha sert à déterminer l'opacité
du matériau et sa couleur est alors mélangée avec l'arrière plan. Dans ce cas, l'ordre d'affichage des facettes est important
puisque l'arrière plan doit être calculé avant. Un défaut fréquent dans les modèles MSTS est que les facettes alpha ne sont pas triées
et que l'arrière plan n'est pas dessiné.</p>
<p>Les autres shaders disponibles dans gmax sont : Diffuse (illuminé, sans texture. Utilise la couleur du matériau.), Tex (texture non illuminée), 
BlendATex (texture non illuminée et Alpha Blending), AddATex (texture non illuminée et couche alpha utilisée en addition), AddATexDiff 
(texture illuminée et couche alpha utilisée en addition)</p>
<p class="titre2">Lighting palette</p>
<p>Le paramètre de Lighting palette permet de préciser le comportement du matériau vis-à-vis de la composante Spéculaire. Au choix, le 
matériau sera mat, légèrement brillant, matériau très brillant, faiblement auto-luminescent, fortement auto-luminescent, sombre.</p>
<p>Cependant, MSTS peut appliquer un grand nombre de shaders qui ne sont pas documentés et indisponibles dans les outils d'export tels
que le gamepack de gmax. Voir <a href="avance.php" class="link1">Techniques Avancées</a></p>
<p class="titre2">Les autres propriétés d'un matériau</p>
<p>Alpha test mode :</p>
<p>Si un matériau utilise le shader <span class="link1">BlendATexDiff</span>, la couche Alpha de la texture sera utilisée pour donner une information de transparence.<br />
Deux choix se présentent. Soit la texture utilisent les 256 niveaux de la couche Alpha pour reproduire un matériau plus ou moins opaque (Alpha test mode = none),
soit la transparence est du tout ou rien (Alpha test mode = trans).<br />
NOTA : dans le cas d'un matériau semi-transparent (Alpha test mode = none), il faut faire attention à la dégradation de la qualité des textures par MSTS.</p>
<p>Le Mip-map Bias :</p>
<p>Lorsque le moteur 3D applique une texture sur une facette, il effectue une opération de redimensionnement des texels et de filtrage linéaire qui
peuvent créer des artefacts par effet de Moiré. Pour eviter ce problème, une texture possède plusieurs représentations préfiltrées de son image.
Par exemple, une texture créée à partir d'une image de 512*512 pixels possèdent évidemment une version 512*512, mais aussi des versions 256*256, 128*128, 64*64...
qui se subsituent à la version à haute résolution si l'objet s'éloigne de la caméra. Ce mécanisme s'appelle le Mip-mapping. Problème, MSTS dégrade 
trop rapidement les textures du matériel roulant.<br />
Le Mip-map Bias permet de fixer un retard dans ce mécanisme en lui donnant une valeur négative. La valeur -3 donne de bons résultats.
<p>Z-Buffer mode</p>
<p>Filtrage</p>
</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 18 Avril 2016<br />
&nbsp;</p>
</body></html>