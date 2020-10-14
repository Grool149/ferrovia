<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>C++ : Allocation de la mémoire</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../../ferrovia.ico" type="image/bmp" />
<link rel="stylesheet" href="../../miseenpage.css" />
<style type="text/css">
<!--
.Style1 {font-size: 10px}
.code {  font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;
.code .comment {    font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace; color: #007F00;}
-->
</style>
</head>
<body>
<div class="SectionBloc">
<p class="titre">Allocation de la mémoire : Pile et Tas</p>
<p>La pile (<span style="font-style: italic;">stack</span>) est l'endroit où un programme va allouer de la mémoire de façon statique. C'est à dire la place destinée à stocker des objets 
dont on connait déjà la taille lors de la compilation du code. Par exemple, une variable de type int prendra 32 bits, un tableau de 5 entiers 
(<span style="code">int tab[5];</span>) prendra 160 bits. Par extension, tous les types utilisateurs dont les membres ont une taille fixe 
ont également une taille connue.</p>
<p>Attention, cela ne veut pas dire que l'on sache à l'avance combien de mémoire un tel programme consommera pendant son exécution. Toutes les variables n'ont
pas la même portée, et à chaque appel de fonction et sous-fonction, une zone de la pile sera allouée pour stocker les variables déclarées 
dans la portée de cette fonction. Cependant, comme les appels de fonctions sont imbriqués les uns dans les autres, les zones de mémoire de la pile
pourront être allouées de façon contigüe et la dernière zone allouée sera la première qui pourra et devra être libérée. D'où le nom de pile : cette mémoire 
fonctionne en pile LIFO (Last In, First Out). C'est le compilateur qui décide quand allouer de la mémoire (lors de la déclaration d'un bloc de portée) et
quand la libérer (à la sortie de ce bloc)</p>

<p>En revanche, dans de nombreux cas, on ne peut pas savoir à l'avance combien de variables le programme devra créer et traiter. On ne sait
pas toujours non plus quelle taille feront certains objets tels que les listes. Il existe donc un mécanisme d'allocation dynamique de mémoire qui va réserver
des octets dans une autre zone : le Tas (heap). Cette allocation est plus complexe. Il n'est pas possible d'allouer des zones de mémoire de façon contigües 
et dans un ordre particulier. En effet, tout objet du tas peut avoir une taille variable et être subitement déplacé ailleurs dans le tas pour lui allouer 
une zone plus grande. Au niveau du code, la gestion du tas est plus délicate. Comme le compilateur ne peut connaître à l'avance la quantité de mémoire à
allouer, c'est le programmeur qui s'en charge dans le code. Mais il a aussi la responsabilité de libérer cette mémoire, sans quoi l'exécution du programme
provoquera des fuites de mémoire.</p>
<p>Le programmeur commence par allouer une zone du tas avec l'opérateur new. Il récupére l'adresse de cette zone et peut la stocker dans un pointeur. 
Il doit désormais ne pas oublier de libérer cette zone grace à l'opérateur delete et le pointeur, de préférence dès que l'objet écrit dans cette 
zone n'est plus utile. Mais il faut faire attention à deux problèmes : on ne doit pas tenter d'accéder à une zone déjà libérée, et le programmeur doit
prendre quelque précaution avec le pointeur. Comme il est possible de copier un pointeur et modifier sa valeur, il faut prendre garde à supprimer la bonne zone et ne la supprimer </p>
</div>
</body>
</html>