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
<p class="soustitre">Comment la 3D est-elle structur�e?</p>
Microsoft Train Simulator stocke le mat�riel roulant dans une arborescence impos�e.
Pour s'y retrouver, je vous conseille cet article de <a href="http://ajtrainsim.free.fr/cap3d/tech/hieral.htm" class="link1">Pierre Gauriat</a>.</p>
<p>Les informations n�cessaires pour afficher et faire fonctionner un mat�riel dans Train Simulator sont s�par�es en plusieurs fichiers. La d�finition de la 
3D d'un mat�riel est contenue dans un fichier Shape (*.s). Elle est organis�e en <span class="link1">Mesh</span>, c'est � dire, en fran�ais, en un treillis ou 
maillage g�om�trique. Ce treillis est form� de <span class="link1">vertices</span> (points positionn�s dans l'espace par leurs coordonn�es cartisiennes X, Y, Z) assembl�s trois par trois pour former 
des triangles. Enfin, ces triangles assembl�s les uns aux autres donnent l'illusion d'une surface plus complexe.</p>
<p>Un vertex n'est pas seulement un point spatial. Il contient aussi d'autres informations : un <span class="link1">vecteur normal</span> et des coordonn�es de <span class="link1">placage de texture</span> (mapping). Le vecteur normal est la direction
perpendiculaire moyenne � la surface des triangles jointifs qui se partagent le vertex. Il a deux utilit�s : il sert � d�terminer o� se trouve l'ext�rieur 
de la surface, car seul ce c�t� sera affich� � l'�cran et l'autre c�t� du triangle restera invisible ; il sert aussi � <span class="link1">illuminer</span> la surface. 
L'angle qu'il forme avec la lumi�re incidente et l'axe de la cam�ra permet de calculer la quantit� de lumi�re re�ue par la surface (lumi�re Diffuse) et de celle r�fl�chie vers la cam�ra (lumi�re Sp�culaire) 
et d'�claircir ou d'assombrir le vertex pour donner une impression de volume (voir <a href="gouraud.php" class="link1">Ombrage de Gouraud</a>). Si l'on souhaite conserver une ar�te visible entre deux
triangles, il faut donc avoir des vecteurs normaux diff�rents. les vertices le long de l'ar�te seront diff�rents m�me si les points spatiaux g�om�triques
contiennent les m�mes coordonn�es X, Y, Z (voir <a href="gmax_lissage.php" class="link1">Lissage</a>).<br />
Les coordonn�es de <span class="link1">mapping</span> sont des coordonn�es cart�siennes planes (U, V) qui
indiquent comment la carte graphique doit d�couper l'image de la texture pour la plaquer sur le triangle, c'est � dire l'habiller,. En g�n�ral, U et V ont des valeurs
d�cimales comprises entre 0 et 1. Mais elles peuvent sortir de ces bornes. Dans ce cas, l'image est reproduite en damier, � l'infini (Mode d'adressage par d�faut des textures : <span class="link1">Wrap</span>), 
ou en mirroir (mode <span class="link1">Mirror</span>). (DirectX pr�voit deux autres modes d'adressage des textures qui semblent moins utiles : Clamp et Border)</p>
<p>NOTA : Le format de codage des vertices et des mat�riaux de MSTS peut en th�orie supporter plusieurs textures et plusieurs canaux de coordonn�es de mapping UV. Cependant
les outils d'export ne permettent pas d'exploiter cette possibilit� et il n'est pas s�r que le moteur 3D de MSTS l'exploite r�ellement.</p>
<p class="soustitre">Objets et sous-objets</p>
Dans un fichier *.s, les triangles sont regroup�s par objet et en fonction du mat�riau qui leur est appliqu�. Un objet se comporte comme un solide dont tous les
vertices sont solidaires. Les objets sont attach�s les uns aux autres par une hi�rarchie pyramidale. Un parent peut avoir plusieurs enfants, mais un enfant n'a qu'un seul parent.</p>
<p>Pour du mat�riel roulant, la caisse forme l'objet principal, le parent. 
Les bogies sont des objets enfants de la caisse. Les essieux sont des objets enfants des bogies.<br />
On peut en th�orie cr�er autant d'objets qu'on le souhaite mais MSTS traite certains enfants de fa�on particuli�re pour les mettre en mouvement durant
la simulation. C'est le cas des bogies qui auront un mouvement de lacet pour suivre la voie, des essieux qui tourneront quand l'engin avancera ou des 
essuie-glaces qui se mettront en mouvement quand la commande sera activ�e. Les autres objets reconnus par d�faut par MSTS sont les pantographes et l'embiellage des
locomotives � vapeur. Le BinPatch permet en plus d'animer les portes (droites ou gauches) et des r�troviseurs amovibles.</p>
<p class="soustitre">Les rep�res</p>
<p>Tous les objets ont un rep�re local O,x,y,z. C'est dans ce rep�re que sont
exprim�es toutes les coordonn�es (x,y,z) des vertices de chaque objet. Pour l'objet de base, la caisse, l'origine de ce rep�re doit se placer � la coordonn�e
(0,0,0). L'origine du rep�re d'un objet enfant, par exemple un bogie, doit �tre plac�e au niveau du pivot du bogie.
Pour des objets plus compliqu�s � animer, notamment les bielles des locomotives � vapeur, le fichier *.s comporte une section <span class="link1">animation</span> qui
permet de programmer les positions successives de l'objet.</p>
</div>
</body>
</html>