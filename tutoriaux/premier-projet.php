<html>
<head>
<title>[Ferrovia] - Premier projet gMax</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style.css">
</head>

<?php

$id = "no";

include("../php/include.txt");
?> 
<table width="1004" border="0" cellpadding="20">
  <tr>
    <td>
      <p class="titre">Mon premier projet gMax</p>
      <span class="text"><p>Pour cette premi&egrave;re vraie le&ccedil;on, il 
        ne s'agit pas de faire un TGV hyper d&eacute;taill&eacute;. Nous allons 
        faire rouler une boite &agrave; chaussures dans MSTS!</p>
      <p>Le but est de se familiariser non pas aux outils de mod&eacute;lisation 
        (d'autres rubriques sont consacr&eacute;es &agrave; cette difficile t&acirc;che) 
        mais aux fonctions permettant d'exporter un mod&egrave;le vers le jeu 
        ainsi que les param&eacute;trages de base &agrave; configurer avant de 
        commencer tout projet.</p>
      <p class="soustitre1">1) Configuration de gMax</p>
      <p>Il faut avant toute chose r&eacute;gler les unit&eacute;s. MSTS utilise 
        le syst&egrave;me m&eacute;trique. Il faut faire de m&ecirc;me dans gMax.</p>
      <p>Menu <b>Customize</b>, <b>Unit Setup</b>, cocher <b>Metric</b> puis <b>Meters</b> 
        dans la boite d&eacute;roulante.<br>
        Toujours dans le menu <b>Customize</b>, <b>Preference</b>, dans l'onglet 
        <b>General</b>, r&eacute;gler <b>System Unit Scale</b> &agrave; 1 Unit 
        = 1,0 Meters</p>
      <p>Cliquer droit sur les boutons de <b>Snap</b>. Dans l'onglet <b>Home Grid</b>, 
        r&eacute;gler <b>Grid Spacing</b> &agrave; 1,0m</p>
      <p>Appuyer sur le bouton <b>Min/Max Toggle <img src="../images/tuts/mn-mxtoggle.gif" width="23" height="22" align="absmiddle" border="1"></b> 
        puis cliquer droit sur le nom de la vue (En haut &agrave; gauche de la 
        vue). Dans le sous menu <b>Views</b>, s&eacute;lectionner <b>Top</b>. 
        Vous pouvez aussi appuyer sur &quot;T&quot;.<br>
        Nous avons donc la vue de dessus en plein &eacute;cran.</p>
      <p class="soustitre1">2) Cr&eacute;ation de la boite</p> 
      <table width="100%" border="0" cellpadding="5">
        <tr>
		  <td class="text"> 
            <p>S&eacute;lectionner le panneau de commande Cr&eacute;er, en mode 
              g&eacute;om&eacute;trie 3D, les <b>Standard Primitives</b>, cliquer 
              sur <b>Box</b>. D&eacute;velopper la barre <b>KeyBoard Entry</b>. 
              Nous allons rentrer tous les param&egrave;tres n&eacute;cessaires 
              &agrave; la cr&eacute;ation de la boite.</p>
            <p>Remplir les param&egrave;tres comme sur la figure. Cliquer sur 
              <b>Create</b>.</p>
            <p>Cela a cr&eacute;&eacute; une boite de 15 m&egrave;tres sur 3 et 
              de 3 m&egrave;tres de haut flottant 1 m&egrave;tre au dessus du 
              sol.</p>
            <p>Taper &quot;Main&quot; dans le champ <b>Name</b> de la section 
              <b>Name and Color</b>. Le rep&egrave;re de Main doit obligatoirement 
              se trouver &agrave; l'origine. S&eacute;lectionner le panneau de 
              commande <b>Hierarchy</b>, cliquer sur <b>Affect Pivot Only</b>. 
              Cliquer droit sur le bouton <b>Select and Move</b> <img src="../images/tuts/sel&move.gif" width="27" height="29" align="absmiddle" border="1"> 
              et mettre &agrave; 0 les trois valeurs du cadre <b>Absolute:World</b>. 
              Le rep&egrave;re de Main se met alors en (0,0,0). Recliquer sur 
              <b>Affect Pivot Only</b> pour le d&eacute;sactiver. </p>
            <p> Finalement, la boite est trop longue, nous souhaitons la r&eacute;duire 
              &agrave; 12 m&egrave;tres de long. S&eacute;lectionner le panneau 
              de commande Modifier. On peut directement changer le param&egrave;tre 
              <b>Length</b> en y &eacute;crivant 12. La boite est redimenssionn&eacute;e 
              &agrave; 12 m&egrave;tres en longueur.</p>
            <p>Cliquer droit sur le nom de la vue et s&eacute;lectionner le mode 
              d'affichage <b>Smooth + Highlights</b>. En appuyant sur la touche 
              P (vue en perspective) et en pivotant avec le bouton <b>Arc Rotate 
              <img src="../images/tuts/arcrotate.gif" width="23" height="21" align="absmiddle" border="1"> 
              </b>, on obtient la vue suivante.</p>
          </td>
          <td><img src="../images/tuts/creation/1proj_1.gif" width="181" height="397" border="1"></td>
          
        </tr>
      </table>
      <p><img src="../images/tuts/creation/1proj_2.gif" width="689" height="651" border="1"> 
      </p>
      <table border="0" width="100%" class="text">
        <tr>
		  <td> 
            <p class="soustitre1">3) Mise en peinture</p>
            <p>MSTS exige que toutes les facettes soient habill&eacute;es d'une 
              texture *.ace. Cela r&eacute;clame donc une texture mais aussi des 
              coordonn&eacute;es de mapping.</p>  
			<p>Les textures doivent &ecirc;tre des fichiers *.bmp ou *.tga de 
              forme carr&eacute;e de dimension 32*32, 64*64, 128*128, 256*256 
              ou 512*512. Les fichier *.tga permettent de contenir une couche 
              alpha qui servira de masque de transparence. Nous utiliserons la 
              texture <a href="1proj.ace" class="text">1proj.ace</a> qui est un 
              simple carr&eacute; de 128 pixels de c&ocirc;t&eacute; de couleur 
              brune.</p>
            <p>S&eacute;lectionner l'objet Main en cliquant dessus. Ouvrir le 
              gestionnaire de mat&eacute;riaux <img src="../images/tuts/mattool.gif" width="29" height="30" align="absmiddle" border="1"> 
              et cliquer sur <b>New</b>. Un mat&eacute;riau apparait nomm&eacute; 
              par d&eacute;faut Material #1.</p>
            <p>Dans le cadre <b>Texture</b>, cliquer sur <b>Open</b> et choisir 
              la texture 1proj.ace sur le disque dur.</p>
            <p>Le cadre <b>Shader</b> peut prendre plusieurs valeurs qui influenceront 
              le comportement du mat&eacute;riau dans le moteur 3D du jeu. Dans 
              MSTS, seuls &eacute;tats peuvent &ecirc;tre utilis&eacute;s. <b>TexDiff</b> 
              est utilis&eacute; pour les mat&eacute;riaux opaques. <b>BlendATexDiff</b> 
              est utilis&eacute; par les mat&eacute;riaux transparents ou translucides. 
              Le champ <b>Mip LOD Bias</b> est mis &agrave; -3. C'est une convention 
              pour le mat&eacute;riel roulant qui permet de retarder l'effet du 
              Mip Mapping de 3 niveaux.</p>
            <p>Le champ <b>Lighting Palette</b> permet de donner de la brillance 
              ou de l'autoluminescence au mat&eacute;riau. L'option <b>OptSpecular0</b> 
              laisse le mat&eacute;riau neutre.</p>
            <p>Appuyer sur <b>Put!</b> pour appliquer le mat&eacute;riau &agrave; 
              l'objet Main. </p>
            <p>Nous allons conserver les coordonn&eacute;es de mapping automatiquement 
              cr&eacute;&eacute;s lors de la cr&eacute;ation de la boite.</p>
          </td>
          <td width="336"> 
            <div align="center"><img src="../images/tuts/creation/1proj_3.gif" width="336" height="480" border="1"></div>
          </td>          
        </tr>
        <tr>
          <td> 
            <p class="soustitre1">4) Cr&eacute;ation des essieux</p>
            <p>Nous allons mettre des essieux sous cette boite. Encore une fois, 
              la mod&eacute;lisation sera simpliste: de simples cylindres. Mais 
              leur mise en place se complique.</p>
            Cliquer droit sur le nom de la vue. Dans le sous menu <b>Views</b>, 
            s&eacute;lectionner <b>Left</b>. On peut &eacute;galement acc&eacute;der 
            &agrave; la vue de gauche par le raccourci clavier &quot;L&quot;.<br>
            Nous avons donc la vue de gauche en plein &eacute;cran. 
            <p>S&eacute;lectionner le panneau de commande Cr&eacute;er, en mode 
              g&eacute;om&eacute;trie 3D, les <b>Standard Primitives</b>, cliquer 
              sur <b>Cylinder</b>. Cliquer sur l'&eacute;cran et d&eacute;placer 
              la souris en maintenant le doigt appuy&eacute;. Un disque se forme. 
              Dans le panneau de contr&ocirc;le, la valeur du champ <b>Radius</b> 
              varie en fonction de la position de la souris. Rel&acirc;cher le 
              doigt et continuer de d&eacute;placer la souris, le rayon du cylindre 
              est fix&eacute; mais la valeur du champ <b>Height</b> varie. Cliquer 
              n'importe sur l'&eacute;cran. Ecrire les valeurs suivantes dans 
              les champs de la section Parameters:</p>
            <p><b>Radius</b> = 0,5m, <b>Height</b> = 2m, <b>Height Segments</b> 
              = 1, <b>Cap Segments</b> = 1, <b>Sides</b> = 12 et cocher <b>Smooth</b>.</p>
            <p>Taper &quot;Wheels11&quot; dans le champ <b>Name</b> de la section 
              <b>Name and Color</b>.</p>
            <p>Pour positionner l'essieu, le s&eacute;lectionner et cliquer sur 
              <b>Align</b> <img src="../images/tuts/align.gif" width="29" height="29" align="absmiddle" border="1"> 
              puis cliquer sur l'objet Main. Une boite s'affiche. Aligner le centre 
              de Wheels11 sur le centre de Main suivant les axes <b>X</b> et <b>Z</b>. 
              Recommencer en alignant cette fois le maximum de Wheels11 sur le 
              minimum de Main suivant l'axe <b>Y</b>. On obtient la vue ci-contre.</p>
            <p>Cliquer droit sur le bouton <b>Select and Move</b> <img src="../images/tuts/sel&move.gif" width="27" height="29" align="absmiddle" border="1">. 
              Taper -4 en <b>X</b> dans le cadre <b>Offset:Screen</b>. Cliquer 
              sur le bouton <b>Array</b> <img src="../images/tuts/array.gif" width="28" height="29" align="absmiddle" border="1">. 
              Une boite de dialogue s'ouvre.</p>
            <p>Dans le tableau <b>Array Transformation</b>, on tape 8 dans la 
              colonne <b>X</b>, &agrave; la ligne <b>Move</b>. On laisse le reste 
              tel quel. Dans le tableau <b>Array Dimension</b>, on laisse la puce 
              <b>1D</b> coch&eacute;e mais on &eacute;crit 2 dans le champ <b>Count</b>. 
              Cliquer sur <b>Ok</b>. Renommer le deuxi&egrave;me essieu &quot;Wheels21&quot;.</p>
            <p>On a juste fait une copie de l'essieu 8 m&egrave;tres plus loin 
              sur l'axe X. Mais l'outil <b>Array</b> permet de r&eacute;aliser 
              des r&eacute;seaux d'objets bien plus complexes.</p>
            <p>On obtient la vue ci-contre.</p>
            <p>Nous n'avons pas dessin&eacute; les cylindres dans la m&ecirc;me 
              vue que la boite. Leurs rep&egrave;res ne sont donc pas align&eacute;s 
              sur le rep&egrave;re World. C'est emb&ecirc;tant car les essieux 
              ne tourneront pas suivant le bon axe. S&eacute;lectionner un essieu. 
              Dans le panneau <b>Hierarchy</b> <img src="../images/tuts/hierarchy.gif" width="24" height="23" border="1">, 
              section <b>Adjust Transform</b>, cliquer sur le bouton <b>Reset 
              Tranform</b>. Le rep&egrave;re s'aligne sur le rep&egrave;re World.</p>
          </td>
          <td width="294" valign="bottom">
            <div align="center"> 
              <p><img src="../images/tuts/creation/1proj_4.gif" width="240" height="148" border="1"></p>
              <p>&nbsp;</p>
              <p><img src="../images/tuts/creation/1proj_5.gif" width="294" height="122" border="1"></p>
              <p>&nbsp;</p>
            </div>
          </td> 
        </tr>
        <tr> 
          <td> 
            <p class="soustitre1">5) Hi&eacute;rarchie</p>
            <p>Se mettre en mode <b>Select and Link</b> <img src="../images/tuts/sel&link.gif" width="26" height="28" border="1" align="absmiddle">. 
              S&eacute;lectionner un essieu, cliquer et sans l&acirc;cher le clic, 
              tirer un lien vers l'objet Main. L&acirc;cher le bouton de la souris. 
              L'essieu est d&eacute;sormais un enfant de Main. Faire de m&ecirc;me 
              avec le second essieu.</p>
            <p>Revenir en mode <b>Select object</b> <img src="../images/tuts/selobj.gif" width="27" height="32" border="1"> 
              puis ouvrir le dialogue <b>Select by Name</b> <img src="../images/tuts/selbyname.gif" width="31" height="34" border="1">.<br>
              Dans ce dialogue, cocher l'option <b>Display Subtree</b>. On voit 
              apparaitre la hi&eacute;rarchie des objets telle qu'on vient de 
              la cr&eacute;er.</p>
            <p>Ouvrir le gestionnaire de mat&eacute;riaux <img src="../images/tuts/mattool.gif" width="29" height="30" border="1" align="absmiddle"> 
              , s&eacute;lectionner Main et cliquer sur <b>Get!</b>. Le mat&eacute;riau 
              Material #1 r&eacute;apparait. S&eacute;lectionner chaque essieu 
              et cliquer sur <b>Put!</b>. Tous les objets sont textur&eacute;s. 
              Nous pouvons exporter le wagon vers MSTS.</p>
          </td>
          <td valign="top"> 
            <p class="soustitre1" align="left">&nbsp;</p>
          </td>
        </tr>
        <tr> 
          <td> 
            <p class="soustitre1">6) Export vers MSTS</p>
            <p>Avant tout, pensez &agrave; sauvegarder le projet avant d'entrer 
              dans le <b>LOD Manager</b>. Il est parfois instable.</p>
            <p>S&eacute;lectionner l'objet Main en cliquant dessus. Ouvrir le 
              menu <b>Train Simulator</b>, <b>LOD Manager</b>, appuyer sur le 
              <b>+</b>. L'arborescence s'affiche. Main est la racine et les deux 
              essieux sont les enfants. Dans le champ <b>LOD Distance</b>, taper 
              2000. C'est la distance &agrave; partir de laquelle le mod&egrave;le 
              sera visible dans le jeu. On peut par exemple utiliser un mod&egrave;le 
              &agrave; 2000 m&egrave;tres, un second &agrave; 1000 m, puis un 
              suivant &agrave; 500 m, &agrave; 100 m...etc de plus en plus d&eacute;taill&eacute;s. 
              Cela permet de soulager la carte graphique du PC en utilisant des 
              objets lointains simples et &agrave; peine visibles. Mais ce sera 
              pour une autre le&ccedil;on!</p>
            <p>Cliquer sur File, puis sur Export to .S. Sauvegarder dans le fichier 
              boite.s. Le fichier 3D est pr&ecirc;t mais il manque d'autres fichiers 
              utiles pour MSTS.</p>
            <p>Le fichier *.sd est le fichier 3D &eacute;tendu. Il contient des 
              informations concernant le comportement de l'objet dans l'environnement 
              3D. Le seul champ utile pour du mat&eacute;riel roulant est le ESD_Bounding_Box. 
              il d&eacute;finit une boite parall&eacute;l&eacute;pip&egrave;dique 
              englobant le wagon qui est utilis&eacute;e dans les calculs de collision. 
              Il faut y param&egrave;trer les dimensions maxi du wagon.</p>
            <p>Le fichier *.wag (ou *.eng pour les engins moteurs) contient des 
              donn&eacute;es techniques utilis&eacute;es par le simulateur.</p>
            <p>Sans entrer dans le d&eacute;tail, voici les deux fichiers utilis&eacute;s: 
              <a href="boite.sd" class="text">boite.sd</a>, <a href="boite.wag" class="text">boite.wag</a>.<br>
              Ces deux fichiers, les fichier boite.s et 1proj.ace sont plac&eacute;s 
              dans un sous r&eacute;pertoire du r&eacute;pertoire Trainset de 
              MSTS </p>
          </td>
          <td> 
            <div align="center"><img src="../images/tuts/creation/1proj_6.gif" width="189" height="549" border="1"></div>
          </td>
        </tr>
        <tr> 
          <td><font size="+1">Voici le r&eacute;sultat!</font></td>
		  <td>
            <div align="center"><img src="../images/tuts/creation/1proj_1.jpg" width="400" height="300" border="1"></div>
          </td>
        </tr>
      </table>
	  </span>
      </td>
  </tr>
</table>
</body>
</html>
