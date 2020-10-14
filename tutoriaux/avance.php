<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Techniques avancées MSTS</title>
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
<p class="titre">Fonctions avancées</p>
<p>Microsoft Train Simulator possède de nombreuses fonctions avancées peu connues car elles n'étaient pas documentées et peu voire pas du tout utilisées 
par le contenu fourni avec le jeu.<br />
Certaines de ces fonctionnalités sont même bugguées, ce qui forcé les développeurs de Kuju à les mettre en sommeil. Plusieurs amateurs indépendants ont
néanmoins réussi, à force d'expérimentation à débusquer quelques fonctions utiles et même à modifier le code de MSTS pour exploiter ces
fonctions méconnues (cf MSTS BinPatch).</p>

<p>Cet article se limitera aux possibilités permises par le format de représentation de la 3D, des techniques d'illumination et d'application de textures.</p>
<p class="titre2">Les shaders</p>
<p>C'est quoi un shader? et bien c'est ce qui défini le comportement d'un matériau. En particulier, si ce matériau utilise des textures, comment il réagit
à la lumière, s'il en émet lui-même, comment ce matériau doit être mélangé avec les objets qui sont derrière lui, comment les textures doivent être filtrées
pour être correctement affichées à l'écran.</p>
<p>L'écrasante majorité du matériel roulant fourni avec MSTS n'utilise que deux shaders : TexDiff et BlendATexDiff. Le premier possède une texture et réagit
à la lumière diffuse. Le second possède les mêmes caractéristiques mais, en plus, permet un mélange avec une couche Alpha. Ensuite, MSTS propose
différents comportements optionnels qui modifient la réflexion spéculaire et l'auto-luminescence d'un objet.</p>
<p>Explication de texte :<br />
Dans un moteur 3D temps réel, il n'est pas possible de calculer le comportement réel de la lumière. L'illumination d'une scène réelle tient compte
de la diffusion d'un très grand nombre de photons qui subissent des réflexions, réfractions, diffractions et absorptions. Lesquelles seraient
bien trop longues à calculer, même en approximation. Un moteur 3D temps réel utilise donc des parades censées imiter très grossièrement le comportement de la
lumière. Le modèle d'illumination des objets utilise plusieurs types de lumière : Ambiente, Diffuse, Spéculaire. 
Ambiente, la plus basique, est une lumière généralisée, sans source particulière, valable dans toutes les directions et pour tous les objets. 
Elle ne permet pas de rendre correctement l'effet 3D, puisque qu'un objet de couleur uniforme n'apparaîtra que comme une tâche plate de cette couleur.<br />
La lumière Diffuse est émise par une source de lumière (Dans MSTS, cela peut être le Soleil ou les phares d'une locomotive). C'est une lumière
réfléchie dans toutes les directions avec la même intensité. Pour reprendre l'exemple d'un objet de couleur uniforme, il apparaîtra plus clair
du côté de la source lumineuse et plus foncé à l'opposé. Cependant, cette couleur ne dépend que de la position de la source de lumière par rapport à l'objet.
Elle ne dépend pas du tout de la position de l'observateur. En clair, si l'observateur se déplace tout autour de l'objet, celui-ci ne change pas de couleur.<br />
La lumière Spéculaire est également émise par une source mais sa réflexion n'est pas homogène, elle dépend du matériau et a une direction de réflexion
privilégiée. Dès lors, la couleur d'un objet dépend de la position de la source de lumière par rapport à cet objet mais aussi de la position de l'observateur.</p>
<p>Quelques exemples : prenons un corps céleste tel que la Lune. Elle est éclairée par le Soleil sur une face tandis que l'autre est dans l'obscurité totale. 
Cela peut être simulé par une source de lumière diffuse et une lumière Ambiente à zéro.<br />
En revanche, dans une scène se déroulant sur Terre, en plein jour, l'atmosphère diffuse la lumière dans toutes les directions. De même,
si l'on se place à l'intérieur d'une pièce, la lumière provenant par une fenêtre se réfléchit sur les murs et nous ne sommes pas dans l'obscurité totale. La composante Ambiente doit donc être finement réglée pour donner l'illusion de toutes
ces réflexions sans devoir les calculer.<br />
Enfin, prenons une scéne ensoleilée, une voie ferrée, ballast, traverses et files de rail bien polies sur lesquelles
arrive une locomotive bien propre. Les pièces métalliques et les vitres de la locomotive seront brillantes et l'observateur verra des reflets 
particulièrment vifs s'il se met dans l'axe de la lumière incidente du soleil. C'est le comportement de réflexion spéculaire qui permettra de reproduire
des matériaux brillants ou mats.</p>

</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 18 Avril 2016<br />
&nbsp;</p>
</body></html>