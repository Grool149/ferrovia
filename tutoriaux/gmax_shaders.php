<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Techniques avancées : Comprendre les shaders MSTS avec gmax</title>
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
<p class="titre">Techniques avancées : Comprendre les shaders MSTS avec gmax</p>
<p>NOTA : Se référer à cet <a href="shader.php" class="link1">article</a> pour comprendre le rôle des shader dans le rendu d'une scène 3D.<br />
Dans les bases de gmax, cet <a href="gmax_materiau.php" class="link1">article</a> explique brièvement comment utiliser gmax pour créer des matériaux, 
plaquer une texture sur un maillage 3D et affiner les coordonnées UV. Il se limite délibéremment aux fonctions les plus utiles et ne décrit que les shaders <span class="link1">TexDiff</span> et <span class="link1">BlendATexDiff</span>. 
Cependant gmax peut exporter d'autres shaders et MSTS en supporte une liste encore plus large pour lesquels il faudra mettre les mains dans le camboui et modifier les fichiers de forme *.s à la main.</p>
<p>Shaders supportés par gmax :<br />
<span class="link1">TexDiff</span> (texture illuminée par l'éclairage diffus),<br />
<span class="link1">BlendATexDiff</span> (texture illuminée par l'éclairage diffus et Alpha Blending),<br />
<span class="link1">Diffuse</span> (illuminé, sans texture. Utilise la couleur du matériau.),<br />
<span class="link1">Tex</span> (texture non illuminée),<br />
<span class="link1">BlendATex</span> (texture non illuminée et Alpha Blending),<br />
<span class="link1">AddATex</span> (texture non illuminée et couche alpha utilisée en addition),<br />
<span class="link1">AddATexDiff</span> (texture illuminée et couche alpha utilisée en addition)</p>
<p class="titre2">Le shader Diffuse</p>
<p>Lors de la création d'un nouvel objet, gmax lui attribut une couleur aléatoire mais pas de matériau. Il est néanmoins possible d'exporter cet objet dans le LOD manager.</p>
<p>En lisant le fichier de forme *.s, on remarque :</p>
<ul>
<li>La déclaration du shader : <pre>	shader_names ( 1
		named_shader ( Diffuse )
	)</pre></li>
<li>L'absence de mode de filtrage des textures, puisqu'aucune texture n'est utilisée par le modèle : <pre>	texture_filter_names ( 0 )</pre></li>
<li>L'absence de coordonnées de mapping : <pre>	uv_points ( 0 )</pre></li>
<li>La section colours comporte deux lignes : <pre>	colours ( 2
		colour ( 0 0 0 0 )
		colour ( 1 1 1 1 )
	)</pre>Les couleurs sont codés sous la forme : Alpha, Rouge, Vert, Bleu avec des valeurs variant entre 0,0 et 1,0. La première est donc un noir transparent, la seconde un blanc pur opaque.</li>
<li>Les sections images et texture sont évidemment vides : <pre>	images ( 0 )
	textures ( 0 )</pre></li>
<li>La configuration de l'illumination comporte un "light_material" et un modèle : <pre>	light_materials ( 1
		light_material ( 00000000 1 1 1 0 25 )
	)
	light_model_cfgs ( 1
		light_model_cfg ( 00000000
			uv_ops ( 0 )
		)
	)</pre>Les valeurs "1 1 1 0" du light_material correspondent à des indices de la section colours pour les lumières Diffuse, Ambiente, Spéculaire, Emissive (l'auto-luminescence). Les indices sont toujours comptés à partir de 0.<br />
Ce light_material réfléchit donc sur la lumière blanche sur les trois premières et n'émet pas de lumière.<br />
La valeur 25 correspond à la "Puissance Spéculaire", ou "facteur de brillance". Puis cette valeur est élevée, plus le matériau paraîtra brillant en réfléchissant davantage de lumière spéculaire.<br />
Le light_model_cfg est réduit au plus simple, il ne comporte aucun opérateur uv (on verra plus tard à quoi sert cet opérateur...).</li>
<li>Un état de vertex est créé :<pre>	vtx_states ( 1
		vtx_state ( 00000000 0 0 0 00000002 )
	)</pre>00000000 est un flag, le premier 0 est l'indice de la section matrices (ici, l'objet n°0), le second 0 est l'indice de la section light_materials (c'est donc le light_material décrit juste avant), le
troisième 0 est l'indice de la section light_model_cfgs (idem).</li>
<li>Un état de primitive est créé : <pre>	prim_states ( 1
		prim_state ( 00000000 0
			tex_idxs ( 0 ) 0 0 0 0 1
		)
	)</pre>Dans cette déclaration, 00000000 est un flag, le premier 0 est l'indice de la section shader_names (Donc le shader Diffuse), tex_idxs comporte une liste d'indices de textures (donc vide).
Les cinq chiffres suivants sont le ZBias, l'indice de vxt_state, l'Alpha test mode, l'indice de la section light_model_cfgs (curieusement redondant avec celui du vtx_state) et mode Z-Buffer.</li>
<li>L'entête du sous-objet s'écrit : <pre>sub_object_header ( 00000000 -1 -1 000000d2 000000c4
</pre>les deux derniers champs se nomment SrcVtxFmtFlags et DstVtxFmtFlags. Ils sont obscurs et, tout ce qu'on peut dire à ce moment est que les valeurs 000000d2 et 000000c4 signifient que le sous-objet n'utilise
pas de slot de texture.</li>
</ul>


<p class="titre2">La couche Alpha</p>
<p>uv_op : ce type d'opérateur étant chargé de remplir un slot de texture<br />
Une texture utilise une image décomposée en Texels (Texture Element). Chacun de ces texels représente un point et peut être codé sur 24 ou 32 bits d'information.
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
<p>Les  disponibles dans gmax sont : </p>
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
Le Mip-map Bias permet de fixer un retard dans ce mécanisme en lui donnant une valeur négative. La valeur -3 donne de bons résultats.</p>
<p>Z-Buffer mode</p>
<p>Filtrage</p>
</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 18 Avril 2016<br />
&nbsp;</p>
</body></html>