<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - Techniques avanc�es : Comprendre les shaders MSTS avec gmax</title>
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
<p class="titre">Techniques avanc�es : Comprendre les shaders MSTS avec gmax</p>
<p>NOTA : Se r�f�rer � cet <a href="shader.php" class="link1">article</a> pour comprendre le r�le des shader dans le rendu d'une sc�ne 3D.<br />
Dans les bases de gmax, cet <a href="gmax_materiau.php" class="link1">article</a> explique bri�vement comment utiliser gmax pour cr�er des mat�riaux, 
plaquer une texture sur un maillage 3D et affiner les coordonn�es UV. Il se limite d�lib�remment aux fonctions les plus utiles et ne d�crit que les shaders <span class="link1">TexDiff</span> et <span class="link1">BlendATexDiff</span>. 
Cependant gmax peut exporter d'autres shaders et MSTS en supporte une liste encore plus large pour lesquels il faudra mettre les mains dans le camboui et modifier les fichiers de forme *.s � la main.</p>
<p>Shaders support�s par gmax :<br />
<span class="link1">TexDiff</span> (texture illumin�e par l'�clairage diffus),<br />
<span class="link1">BlendATexDiff</span> (texture illumin�e par l'�clairage diffus et Alpha Blending),<br />
<span class="link1">Diffuse</span> (illumin�, sans texture. Utilise la couleur du mat�riau.),<br />
<span class="link1">Tex</span> (texture non illumin�e),<br />
<span class="link1">BlendATex</span> (texture non illumin�e et Alpha Blending),<br />
<span class="link1">AddATex</span> (texture non illumin�e et couche alpha utilis�e en addition),<br />
<span class="link1">AddATexDiff</span> (texture illumin�e et couche alpha utilis�e en addition)</p>
<p class="titre2">Le shader Diffuse</p>
<p>Lors de la cr�ation d'un nouvel objet, gmax lui attribut une couleur al�atoire mais pas de mat�riau. Il est n�anmoins possible d'exporter cet objet dans le LOD manager.</p>
<p>En lisant le fichier de forme *.s, on remarque :</p>
<ul>
<li>La d�claration du shader : <pre>	shader_names ( 1
		named_shader ( Diffuse )
	)</pre></li>
<li>L'absence de mode de filtrage des textures, puisqu'aucune texture n'est utilis�e par le mod�le : <pre>	texture_filter_names ( 0 )</pre></li>
<li>L'absence de coordonn�es de mapping : <pre>	uv_points ( 0 )</pre></li>
<li>La section colours comporte deux lignes : <pre>	colours ( 2
		colour ( 0 0 0 0 )
		colour ( 1 1 1 1 )
	)</pre>Les couleurs sont cod�s sous la forme : Alpha, Rouge, Vert, Bleu avec des valeurs variant entre 0,0 et 1,0. La premi�re est donc un noir transparent, la seconde un blanc pur opaque.</li>
<li>Les sections images et texture sont �videmment vides : <pre>	images ( 0 )
	textures ( 0 )</pre></li>
<li>La configuration de l'illumination comporte un "light_material" et un mod�le : <pre>	light_materials ( 1
		light_material ( 00000000 1 1 1 0 25 )
	)
	light_model_cfgs ( 1
		light_model_cfg ( 00000000
			uv_ops ( 0 )
		)
	)</pre>Les valeurs "1 1 1 0" du light_material correspondent � des indices de la section colours pour les lumi�res Diffuse, Ambiente, Sp�culaire, Emissive (l'auto-luminescence). Les indices sont toujours compt�s � partir de 0.<br />
Ce light_material r�fl�chit donc sur la lumi�re blanche sur les trois premi�res et n'�met pas de lumi�re.<br />
La valeur 25 correspond � la "Puissance Sp�culaire", ou "facteur de brillance". Puis cette valeur est �lev�e, plus le mat�riau para�tra brillant en r�fl�chissant davantage de lumi�re sp�culaire.<br />
Le light_model_cfg est r�duit au plus simple, il ne comporte aucun op�rateur uv (on verra plus tard � quoi sert cet op�rateur...).</li>
<li>Un �tat de vertex est cr�� :<pre>	vtx_states ( 1
		vtx_state ( 00000000 0 0 0 00000002 )
	)</pre>00000000 est un flag, le premier 0 est l'indice de la section matrices (ici, l'objet n�0), le second 0 est l'indice de la section light_materials (c'est donc le light_material d�crit juste avant), le
troisi�me 0 est l'indice de la section light_model_cfgs (idem).</li>
<li>Un �tat de primitive est cr�� : <pre>	prim_states ( 1
		prim_state ( 00000000 0
			tex_idxs ( 0 ) 0 0 0 0 1
		)
	)</pre>Dans cette d�claration, 00000000 est un flag, le premier 0 est l'indice de la section shader_names (Donc le shader Diffuse), tex_idxs comporte une liste d'indices de textures (donc vide).
Les cinq chiffres suivants sont le ZBias, l'indice de vxt_state, l'Alpha test mode, l'indice de la section light_model_cfgs (curieusement redondant avec celui du vtx_state) et mode Z-Buffer.</li>
<li>L'ent�te du sous-objet s'�crit : <pre>sub_object_header ( 00000000 -1 -1 000000d2 000000c4
</pre>les deux derniers champs se nomment SrcVtxFmtFlags et DstVtxFmtFlags. Ils sont obscurs et, tout ce qu'on peut dire � ce moment est que les valeurs 000000d2 et 000000c4 signifient que le sous-objet n'utilise
pas de slot de texture.</li>
</ul>


<p class="titre2">La couche Alpha</p>
<p>uv_op : ce type d'op�rateur �tant charg� de remplir un slot de texture<br />
Une texture utilise une image d�compos�e en Texels (Texture Element). Chacun de ces texels repr�sente un point et peut �tre cod� sur 24 ou 32 bits d'information.
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
<p>Les  disponibles dans gmax sont : </p>
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
Le Mip-map Bias permet de fixer un retard dans ce m�canisme en lui donnant une valeur n�gative. La valeur -3 donne de bons r�sultats.</p>
<p>Z-Buffer mode</p>
<p>Filtrage</p>
</div>
<div class="retour"><a href="index.php">Retour Index des tutoriaux</a></div>
<p id="footer">Ferrovia - 18 Avril 2016<br />
&nbsp;</p>
</body></html>