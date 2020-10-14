<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>C++ : La pr�-incr�mentation</title>
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
<p class="titre">Astuces d'optimisation du code : la pr�-incr�mentation</p>
<p>Il est possible d'incr�menter une valeur de 1 avec la commande n++ (post-incr�mentation) ou la commande ++n (pr�-incr�mentation).<br />
La diff�rence entre ces deux op�rateurs r�side dans la valeur de retour si elle est affect�e � une variable</p>
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
<p>Si la valeur de retour n'est pas utilis�e, la pr�-incr�mentation est pr�f�rable car la post-incr�mentation cr�e une valeur temporaire, qui serait inutile dans ce cas.<br />
Pour les types de bases, notamment les <b>int</b> utilis�s comme compteurs de boucle, les compilateurs �volu�s savent g�n�ralement optimiser une post-incr�mentation
en supprimant la cr�ation de la valeur temporaire lorsqu'elle est inutile. Cependant, pour des types utilisateurs, cette optimisation est moins �vidente, d'autant que les 
op�rateurs de pr� et post-incr�mentation sont des fonctions cod�es sp�cifiquement. Il est donc une bonne pratique d'utiliser la pr�-incr�mentation par d�faut.</p>
</div>
</body>
</html>