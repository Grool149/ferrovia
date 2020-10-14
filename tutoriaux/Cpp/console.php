<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>C++ : Console</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../../ferrovia.ico" type="image/bmp" />
<link rel="stylesheet" href="../../miseenpage.css" />
</head>
<style type="text/css">
<!--
.Style1 {font-size: 10px}
.code {  font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;
.code .comment {    font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace; color: #007F00;}
-->
</style>
<body>
<div class="SectionBloc">
<p class="titre">Console Windows : afficher des caract�res sp�ciaux dans la sortie standard</p>
<p class="code">
#include &lt;windows.h&gt;<br />
#include &lt;string&gt;<br />
<br />
<span style="color: #007F00;">// Transforme les caract�res ANSI ASCII en format OEM pour affichage correct des diacritiques sur la console.</span><br />
std::string FormaterPourConsole(const std::string &src)<br />
{<br />
&nbsp;&nbsp;using namespace std;<br />
&nbsp;&nbsp;vector&lt;char&gt; v(src.size() + 1);<span style="color: #007F00;"> // remplit v de '\0' avec espace pour un d�limiteur</span><br />
&nbsp;&nbsp;CharToOem(src.c_str(), &v[0]);<br />
&nbsp;&nbsp;return string(begin(v), end(v));<br />
}</p>

<p>Autre exemple :<br />
Pour �viter l'appel direct � la fonction CharToOem et des fuites de m�moire en cas d'utilisation de tableaux de char, on cr�� un type et on surcharge l'op�rateur &lt;&lt;
</p>
<p class="code">#include &lt;sstream&gt;<br />
#include &lt;cstring&gt;<br />
<br />
struct SetOEM<br />
{<br />
&nbsp;&nbsp;SetOEM(const char* s) : _oem(s) {}<br />
&nbsp;&nbsp;const char* _oem;<br />
};<br />
<br />
inline SetOEM OEM(const char* s)<br />
{<br />
&nbsp;&nbsp;return SetOEM(s);<br />
}<br />
<br />
template &lt;class charT, class traits&gt; std::basic_ostream&lt;charT, traits&gt;& operator&lt;&lt;(std::basic_ostream&lt;charT, traits&gt;& out, SetOEM oem)<br />
{<br />
&nbsp;&nbsp;char* s;<br />
&nbsp;&nbsp;s = new char[strlen(oem._oem) + 1];<br />
&nbsp;&nbsp;strcpy(s, oem._oem); <span style="color: #007F00;">// � remplacer par CharToOem(oem, s);</span><br />
&nbsp;&nbsp;out &lt;&lt; s;<br />
&nbsp;&nbsp;delete [] s;<br />
&nbsp;&nbsp;return out;<br />
}<br />
<br />
int main ()<br />
{<br />
&nbsp;&nbsp;char caf[] = "Les caract�res fran�ais doivent �tre convertis";<br />
&nbsp;&nbsp;std::cout &lt;&lt; std::endl<br />
&nbsp;&nbsp;&lt;&lt; OEM("D�mo de ca() n� 1 : ") &lt;&lt; OEM(caf) &lt;&lt; std::endl<br />
&nbsp;&nbsp;&lt;&lt; OEM("D�mo de ca() n� 2 : ") &lt;&lt; OEM("No�lle aper�ut l�-bas l'�ne b�t�") &lt;&lt; std::endl<br />
&nbsp;&nbsp;&lt;&lt; std::endl &lt;&lt; std::endl<br />
&nbsp;&nbsp;&lt;&lt; "Au revoir !" &lt;&lt; std::endl<br />
&nbsp;&nbsp;&lt;&lt; std::endl;<br />
&nbsp;&nbsp;return 0;<br />
}</p>
</div>
</body>
</html>