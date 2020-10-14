<?php

include('config.php');

function Executer($requete)
{
if ($res = mysql_query ($requete))
{return $res;}
else
{return false;}
}

function Connexion($serv, $login, $pass, $dbase)
{
if (!($serveur = @mysql_connect($serv,$login, $pass)))
{echo "probleme serveur";
exit;}
if(!($base = @mysql_selectdb($dbase)))
{"probleme base";
exit;}
return $serveur;
}

function Debut()
{echo "<html><body>";
}

function Fin()
{global $Lien;
echo "<a href=\"javascript:history.back();\"><b>Retour à la fenêtre de saisie</b></a>";
echo "</body></html>";
mysql_close($Lien);
exit;
}

Debut();

$Lien = Connexion($dbhost,$dbuser,$dbpasswd,$dbname);

if($simtrain=='on') $simtrain = true;

$req = "INSERT INTO materiel_elements ( type , nom , description , url_image , url_download , taille , nationalité , date , simtrain , auteur ) ".
"VALUES ( '$type', '$nom', '$description', '$url_image', '$url_download', '$taille', '$nationalite', CURDATE() , '$simtrain', '$auteur')";

Executer ($req);

Fin();
?>