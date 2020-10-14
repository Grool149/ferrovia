<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>C++ : Console</title>
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
<p class="titre">Console Windows : afficher des caractères spéciaux dans la sortie standard</p>
<p>Utilisation de la fonction CharToOem fournie par Windows :</p>
<pre>
  #include &lt;windows.h&gt;
  #include &lt;string&gt;
<span style="color: #007F00;">  // Transforme les caractères ANSI ASCII en format OEM pour affichage correct des diacritiques sur la console.</span>
  std::string FormaterPourConsole(const std::string &amp;src)
  {
    using namespace std;
    vector&lt;char&gt; v(src.size() + 1);<span style="color: #007F00;"> // remplit v de '\0' avec espace pour un délimiteur</span>
    CharToOem(src.c_str(), &amp;v[0]);
    return string(begin(v), end(v));
  }</pre>

<p>Autre exemple :<br />
Pour éviter l'appel direct à la fonction CharToOem et des fuites de mémoire en cas d'utilisation de tableaux de char, on créé un type et on surcharge l'opérateur &lt;&lt;
</p>
<pre>
  #include &lt;sstream&gt;
  #include &lt;cstring&gt;

  struct SetOEM
  {
    SetOEM(const char* s) : _oem(s) {}
    const char* _oem;
  };

  inline SetOEM OEM(const char* s)
  {
    return SetOEM(s);
  }

  template &lt;class charT, class traits&gt; std::basic_ostream&lt;charT, traits&gt;&amp; operator&lt;&lt;(std::basic_ostream&lt;charT, traits&gt;&amp; out, SetOEM oem)
  {
    char* s;
    s = new char[strlen(oem._oem) + 1];
    strcpy(s, oem._oem); <span style="color: #007F00;">// à remplacer par CharToOem(oem, s);</span>
    out &lt;&lt; s;
    delete [] s;
    return out;
  }

  int main ()
  {
    char caf[] = "Les caractères français doivent être convertis";
    std::cout &lt;&lt; std::endl
    &lt;&lt; OEM("Démo de ca() n° 1 : ") &lt;&lt; OEM(caf) &lt;&lt; std::endl
    &lt;&lt; OEM("Démo de ca() n° 2 : ") &lt;&lt; OEM("Noëlle aperçut là-bas l'âne bâté") &lt;&lt; std::endl
    &lt;&lt; std::endl &lt;&lt; std::endl
    &lt;&lt; "Au revoir !" &lt;&lt; std::endl
    &lt;&lt; std::endl;
    return 0;
  }</pre>
</div>
</body>
</html>