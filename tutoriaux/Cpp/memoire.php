<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>C++ : Allocation de la m�moire</title>
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
<p class="titre">Allocation de la m�moire : Pile et Tas</p>
<p>La pile (<span style="font-style: italic;">stack</span>) est l'endroit o� un programme va allouer de la m�moire de fa�on statique. C'est � dire la place destin�e � stocker des objets 
dont on connait d�j� la taille lors de la compilation du code. Par exemple, une variable de type int prendra 32 bits, un tableau de 5 entiers 
(<span style="code">int tab[5];</span>) prendra 160 bits. Par extension, tous les types utilisateurs dont les membres ont une taille fixe 
ont �galement une taille connue.</p>
<p>Attention, cela ne veut pas dire que l'on sache � l'avance combien de m�moire un tel programme consommera pendant son ex�cution. Toutes les variables n'ont
pas la m�me port�e, et � chaque appel de fonction et sous-fonction, une zone de la pile sera allou�e pour stocker les variables d�clar�es 
dans la port�e de cette fonction. Cependant, comme les appels de fonctions sont imbriqu�s les uns dans les autres, les zones de m�moire de la pile
pourront �tre allou�es de fa�on contig�e et la derni�re zone allou�e sera la premi�re qui pourra et devra �tre lib�r�e. D'o� le nom de pile : cette m�moire 
fonctionne en pile LIFO (Last In, First Out). C'est le compilateur qui d�cide quand allouer de la m�moire (lors de la d�claration d'un bloc de port�e) et
quand la lib�rer (� la sortie de ce bloc)</p>

<p>En revanche, dans de nombreux cas, on ne peut pas savoir � l'avance combien de variables le programme devra cr�er et traiter. On ne sait
pas toujours non plus quelle taille feront certains objets tels que les listes. Il existe donc un m�canisme d'allocation dynamique de m�moire qui va r�server
des octets dans une autre zone : le Tas (heap). Cette allocation est plus complexe. Il n'est pas possible d'allouer des zones de m�moire de fa�on contig�es 
et dans un ordre particulier. En effet, tout objet du tas peut avoir une taille variable et �tre subitement d�plac� ailleurs dans le tas pour lui allouer 
une zone plus grande. Au niveau du code, la gestion du tas est plus d�licate. Comme le compilateur ne peut conna�tre � l'avance la quantit� de m�moire �
allouer, c'est le programmeur qui s'en charge dans le code. Mais il a aussi la responsabilit� de lib�rer cette m�moire, sans quoi l'ex�cution du programme
provoquera des fuites de m�moire.</p>
<p>Le programmeur commence par allouer une zone du tas avec l'op�rateur new. Il r�cup�re l'adresse de cette zone et peut la stocker dans un pointeur. 
Il doit d�sormais ne pas oublier de lib�rer cette zone grace � l'op�rateur delete et le pointeur, de pr�f�rence d�s que l'objet �crit dans cette 
zone n'est plus utile. Mais il faut faire attention � deux probl�mes : on ne doit pas tenter d'acc�der � une zone d�j� lib�r�e, et le programmeur doit
prendre quelque pr�caution avec le pointeur. Comme il est possible de copier un pointeur et modifier sa valeur, il faut prendre garde � supprimer la bonne zone et ne la supprimer </p>
</div>
</body>
</html>