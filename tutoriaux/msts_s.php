<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>[Ferrovia] - La 3D dans MSTS</title>
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
<p class="titre">La 3D dans MSTS</p>
<p class="soustitre">Comment la 3D est-elle structurée?</p>
Microsoft Train Simulator stocke le matériel roulant dans une arborescence imposée.
Pour s'y retrouver, je vous conseille cet article de <a href="http://ajtrainsim.free.fr/cap3d/tech/hieral.htm" class="link1">Pierre Gauriat</a>.</p>
<p>Les informations nécessaires pour afficher et faire fonctionner un matériel dans Train Simulator sont séparées en plusieurs fichiers. La définition de la 
3D d'un matériel est contenue dans un fichier Shape (*.s). Elle est organisée en <span class="link1">Mesh</span>, c'est à dire, en français, en un treillis ou 
maillage géométrique. Ce treillis est formé de <span class="link1">vertices</span> (points positionnés dans l'espace par leurs coordonnées cartisiennes X, Y, Z) assemblés trois par trois pour former 
des triangles. Enfin, ces triangles assemblés les uns aux autres donnent l'illusion d'une surface plus complexe.</p>
<p>Un vertex n'est pas seulement un point spatial. Il contient aussi d'autres informations : un <span class="link1">vecteur normal</span> et des coordonnées de <span class="link1">placage de texture</span> (mapping). Le vecteur normal est la direction
perpendiculaire moyenne à la surface des triangles jointifs qui se partagent le vertex. Il a deux utilités : il sert à déterminer où se trouve l'extérieur 
de la surface, car seul ce côté sera affiché à l'écran et l'autre côté du triangle restera invisible ; il sert aussi à <span class="link1">illuminer</span> la surface. 
L'angle qu'il forme avec la lumière incidente et l'axe de la caméra permet de calculer la quantité de lumière reçue par la surface (lumière Diffuse) et de celle réfléchie vers la caméra (lumière Spéculaire) 
et d'éclaircir ou d'assombrir le vertex pour donner une impression de volume (voir <a href="gouraud.php" class="link1">Ombrage de Gouraud</a>). Si l'on souhaite conserver une arête visible entre deux
triangles, il faut donc avoir des vecteurs normaux différents. les vertices le long de l'arête seront différents même si les points spatiaux géométriques
contiennent les mêmes coordonnées X, Y, Z (voir <a href="gmax_lissage.php" class="link1">Lissage</a>).<br />
Les coordonnées de <span class="link1">mapping</span> sont des coordonnées cartésiennes planes (U, V) qui
indiquent comment la carte graphique doit découper l'image de la texture pour la plaquer sur le triangle, c'est à dire l'habiller,. En général, U et V ont des valeurs
décimales comprises entre 0 et 1. Mais elles peuvent sortir de ces bornes. Dans ce cas, l'image est reproduite en damier, à l'infini (Mode d'adressage par défaut des textures : <span class="link1">Wrap</span>), 
ou en mirroir (mode <span class="link1">Mirror</span>). (DirectX prévoit deux autres modes d'adressage des textures qui semblent moins utiles : Clamp et Border)</p>
<p>NOTA : Le format de codage des vertices et des matériaux de MSTS peut en théorie supporter plusieurs textures et plusieurs canaux de coordonnées de mapping UV. Cependant
les outils d'export ne permettent pas d'exploiter cette possibilité et il n'est pas sûr que le moteur 3D de MSTS l'exploite réellement.</p>
<p class="soustitre">Objets et sous-objets</p>
Dans un fichier *.s, les triangles sont regroupés par objet et en fonction du matériau qui leur est appliqué. Un objet se comporte comme un solide dont tous les
vertices sont solidaires. Les objets sont attachés les uns aux autres par une hiérarchie pyramidale. Un parent peut avoir plusieurs enfants, mais un enfant n'a qu'un seul parent.</p>
<p>Pour du matériel roulant, la caisse forme l'objet principal, le parent. 
Les bogies sont des objets enfants de la caisse. Les essieux sont des objets enfants des bogies.<br />
On peut en théorie créer autant d'objets qu'on le souhaite mais MSTS traite certains enfants de façon particulière pour les mettre en mouvement durant
la simulation. C'est le cas des bogies qui auront un mouvement de lacet pour suivre la voie, des essieux qui tourneront quand l'engin avancera ou des 
essuie-glaces qui se mettront en mouvement quand la commande sera activée. Les autres objets reconnus par défaut par MSTS sont les pantographes et l'embiellage des
locomotives à vapeur. Le BinPatch permet en plus d'animer les portes (droites ou gauches) et des rétroviseurs amovibles.</p>
<p class="soustitre">Les repères</p>
<p>Tous les objets ont un repère local O,x,y,z. C'est dans ce repère que sont
exprimées toutes les coordonnées (x,y,z) des vertices de chaque objet. Pour l'objet de base, la caisse, l'origine de ce repère doit se placer à la coordonnée
(0,0,0). L'origine du repère d'un objet enfant, par exemple un bogie, doit être placée au niveau du pivot du bogie.
Pour des objets plus compliqués à animer, notamment les bielles des locomotives à vapeur, le fichier *.s comporte une section <span class="link1">animation</span> qui
permet de programmer les positions successives de l'objet.</p>
</div>
</body>
</html>