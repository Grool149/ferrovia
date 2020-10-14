<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>C++ : La pré-incrémentation</title>
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
<p class="titre">Astuces d'optimisation du code : la pré-incrémentation</p>
<p>Il est possible d'incrémenter une valeur de 1 avec la commande n++ (post-incrémentation) ou la commande ++n (pré-incrémentation).<br />
La différence entre ces deux opérateurs réside dans la valeur de retour si elle est affectée à une variable</p>
<p class="code">
void UneFonction(void)<br />
{<br />
	int i=5, j=5;<br />
 <br />
	int a = i++;<br />
	int b = ++j;<br />
 <br />
<span style="color: #007F00;">	/* Ici, i et j valent tous les deux 6.<br />
	   Par contre, a vaut 5 et b vaut 6. */</span><br />
}</p>
<p>Si la valeur de retour n'est pas utilisée, la pré-incrémentation est préférable car la post-incrémentation crée une valeur temporaire, qui serait inutile dans ce cas.<br />
Pour les types de bases, notamment les <b>int</b> utilisés comme compteurs de boucle, les compilateurs évolués savent généralement optimiser une post-incrémentation
en supprimant la création de la valeur temporaire lorsqu'elle est inutile. Cependant, pour des types utilisateurs, cette optimisation est moins évidente, d'autant que les 
opérateurs de pré et post-incrémentation sont des fonctions codées spécifiquement. Il est donc une bonne pratique d'utiliser la pré-incrémentation par défaut.</p>
</div>
</body>
</html>