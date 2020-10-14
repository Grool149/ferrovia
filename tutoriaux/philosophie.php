<html>
<head>
<title>[Ferrovia] - philosophie de gmax</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style.css">
</head>
<?php

$id = "no";

include("../php/include.txt");
?> 
<table width="1000" border="0" cellpadding="20">
  <tr>
    <td class="soustitre1"> 
      <p><span class="titre">La philosophie de gmax</span></p>
      <span class="text"> 
      <p>Ce qui est le plus d&eacute;routant lorsque l'on manipule pour la premi&egrave;re 
        fois un modeleur tel que gmax, c'est qu'on ne sait pas par quel bout le 
        prendre en main. De nombreux menus et de nombreuses fonctions submergent 
        vite le n&eacute;ophyte. gmax devient pourtant assez simple &agrave; utiliser 
        d&egrave;s que l'on comprend comment on &quot;fait&quot; de la 3D.</p>
      <p class="soustitre1">Le r&eacute;sultat &agrave; atteindre</p>
      <p>Pour comprendre l'architecture de gmax et la fa&ccedil;on de travailler 
        avec, il convient de prendre le probl&egrave;me &agrave; l'envers en regardant 
        ce qu'on attend en sortie. La 3D temps r&eacute;el &eacute;voque au joueur 
        des volumes en 3 dimensions qui s'apparentent aux objets de son environnement 
        r&eacute;el. Que nenni! On vous ment, on vous spolie! La 3D temps r&eacute;el 
        telle qu'elle est r&eacute;alis&eacute;e aujourd'hui par nos cartes graphiques 
        ne produit aucun volume mais uniquement des surfaces. Pire encore, uniquement 
        des surfaces planes et m&ecirc;me le plus simple polygone qui soit: le 
        triangle. Car, en g&eacute;om&eacute;trie, 3 points d&eacute;finissent 
        un plan unique.</p>
      <p>Un objet 3D est donc un nuage de points situ&eacute;s dans l'espace et 
        reli&eacute;s 3 par 3 en triangles. D&eacute;finir tous ces points (quelques 
        milliers par objet) &agrave; la main serait fastidieux et hasardeux. De 
        plus l'utilisateur cherche, en g&eacute;n&eacute;ral, &agrave; dessiner 
        des objets g&eacute;om&eacute;triques ayant des propri&eacute;t&eacute;s 
        math&eacute;matiques particuli&egrave;res. L'objectif d'un modeleur est 
        donc de proposer des formes param&eacute;triques, de les modifier selon 
        les d&eacute;sirs de l'utilisateur puis de tout transformer en triangles.</p>
      <p>Afin de garantir un historique pour permettre des Undo/Redo, gmax s'articule, 
        pour chaque objet, autour d'<a href="pile.php" class="link1">une pile 
        d'actions</a> qui d&eacute;bute par la cr&eacute;ation d'une primitive 
        et se poursuit par des modifications. La pile d&eacute;finit les &eacute;tapes 
        de construction de l'objet. A tout instant, gmax peut reconstruire un 
        objet en parcourant les actions de la pile depuis sa base de la m&ecirc;me 
        fa&ccedil;on qu'on suit le plan de montage d'une armoire Ikea.</p>
      <p class="soustitre1">Modificateurs et transformations</p>
      <p>Les actions pr&eacute;sentes dans la pile sont en g&eacute;n&eacute;ral 
        des modificateurs. Chaque modificateur utilise en entr&eacute;e l'objet 
        produit par la primitive ou le modificateur pr&eacute;c&eacute;dent. On 
        trouve cependant des actions bien particuli&egrave;res qui ne se comportent 
        pas de la m&ecirc;me fa&ccedil;on: les transformations.</p>
      <p>Les transformations, ce sont la translation, la rotation et l'homoth&eacute;tie 
        (changement d'&eacute;chelle). Ces trois actions se placent <u>syst&egrave;matiquement</u> 
        &agrave; la fin de la pile apr&egrave;s le dernier modificateur et sont 
        combin&eacute;s dans un quaternion (matrice de degr&eacute; 4). C'est 
        assez surprenant lorsqu'on souhaite, par exemple, r&eacute;aliser un objet 
        bool&eacute;en &agrave; partir d'un objet qui a subi une homoth&eacute;tie. 
        car l'objet est utilis&eacute; dans l'op&eacute;ration bool&eacute;enne 
        <u>avant</u> d'avoir subi l'homoth&eacute;tie. Il est donc recommand&eacute; 
        de ne pas travailler sur l'objet lui-m&ecirc;me mais sur les sous-objets 
        gr&acirc;ce &agrave; un Edit Mesh. Cette fonction est le modificateur 
        de base quand on fait de la LPM (Low Polys Modelisation), car il donne 
        acc&egrave;s aux sous-ensembles qui composent l'objet. C'est &agrave; 
        dire, ses vertices, ses segments ou ses facettes.</p>
      <p><span class="soustitre1">R&eacute;alisation d'un objet</span> </p>
      <p>La premi&egrave;re &eacute;tape est la cr&eacute;ation d'une primitive 
        3D ou 2D. Une s&eacute;rie de modificateurs donnera la forme souhait&eacute;e 
        &agrave; l'objet, lui appliquera des textures 
   <!--   <p class="soustitre1">R&eacute;p&egrave;res</p>
      <p class="soustitre1">Hi&eacute;rarchie</p>
      -->
      <p class="link1">Ferrovia - 29 Ao&ucirc;t 2004</p>
      </span></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
