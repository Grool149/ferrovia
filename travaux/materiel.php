<?php
/***************************************************************************
 *   
 *
 ***************************************************************************/

function ChercheDrapeau($array, $id)
{
for($j = 0; $j < count($array); $j++)
	{
	if ($array[$j]['nationalite']=$id) return $array[$j]['URLdrapeau'];
	}
}

define('IN_VIEWMATERIEL', true);
$viewmateriel_root_path = './';

include('config.php');
include('mysql.php');
include('constant.php');

include("header.inc");

$db = new sql_db($dbhost, $dbuser, $dbpasswd, $dbname, false);

if ( isset($_GET[MATERIEL_TYPE_URL]) )
{
	$type_id = intval($_GET[MATERIEL_TYPE_URL]);
}

if ( isset($_GET[MATERIEL_NATIONALITE_URL]) )
{
	$nationalite_id = intval($_GET[MATERIEL_NATIONALITE_URL]);
}

$start = ( isset($_GET[PAGE_URL]) ) ? intval($_GET[PAGE_URL]) : 0;

$post_per_page = 10;

//
// Requête SQL pour compter le nombres d'enregistrements
//

$WHERE_sql = ( !(isset($nationalite_id) || isset($type_id) ) ) ? '' : " WHERE";
$type_sql = ( !isset($type_id) ) ? '' : " type = $type_id";
$AND_sql = ( !(isset($type_id) && isset($nationalite_id) ) ) ? '' : " AND";
$nationalite_sql = ( !isset($nationalite_id) ) ? '' : " nationalite = $nationalite_id";

$sql = "SELECT id, type, nationalite FROM materiel_elements" .
	 $WHERE_sql . $type_sql . $AND_sql . $nationalite_sql;


if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain type information", '', __LINE__, __FILE__, $sql);
}

$num_rows = mysql_num_rows($result);

$sql = "SELECT id, type, nationalite, nom, description, url_image, url_download, taille, date, simtrain, auteur FROM materiel_elements" .
	 $WHERE_sql . $type_sql . $AND_sql . $nationalite_sql . " ORDER BY simtrain DESC, id DESC LIMIT $start, $post_per_page";

if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain type information", '', __LINE__, __FILE__, $sql);
}

if ( $row = $db->sql_fetchrow($result) )
{
	$postrow = array();
	
	do
	{
		$postrow[] = $row;
	}
	while ( $row = $db->sql_fetchrow($result) );
	$db->sql_freeresult($result);

	$total_posts = count($postrow);
}
else
{
	message_die(GENERAL_MESSAGE, $lang['No_posts_topic']);
}

$sql = "SELECT * FROM materiel_nationalite" . $WHERE_sql . $nationalite_sql;

if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain type information", '', __LINE__, __FILE__, $sql);
}

if ( $row = $db->sql_fetchrow($result) )
{
	$drapeau = array();
	do
	{
		$drapeau[] = $row;
	}
	while ( $row = $db->sql_fetchrow($result) );
	$db->sql_freeresult($result);
}
else
{
	message_die(GENERAL_MESSAGE, $lang['No_posts_topic']);
}

echo "<table border=0 width=\"100%\">\n";

for($i=0;$i<$total_posts;$i++)
{
	$nom = $postrow[$i]['nom'];
	$description = $postrow[$i]['description'];
	$url_image = $postrow[$i]['url_image'];
	$url_download = $postrow[$i]['url_download'];
	$taille = $postrow[$i]['taille'];
	$date = $postrow[$i]['date'];
	$auteur = $postrow[$i]['auteur'];

	$url_drapeau = ChercheDrapeau($drapeau, $postrow[$i]['nationalite']);
	//
	// Replace newlines (we use this rather than nl2br because
	// till recently it wasn't XHTML compliant)
	//
	$description = str_replace("\n", "\n<br />\n", $description);

	//
	// Again this will be handled by the templating
	// code at some point
	//
	$row_class = ( !($i % 2) ) ? 'td_class1' : 'td_class2';

/*	echo "<tr>\n<td class=$row_class>\n<table border=1 width=\"100%\">\n" .
	"<tr>\n<td  rowspan=\"3\" width=\"60" align=>\n" .
	"<img src=\"$url_drapeau\"></td>\n" .
	"<td rowspan=\"3\" width=\"200\"><img src=\"$url_image\"></td>" .
	"<td>$nom</td>" .
	"<td width=\"10%\">$taille</td></tr>\n" .
	"<tr><td>$description . "\n\nPar : " . $auteur</td>" .
	"<td rowspan=\"2\">$url_download</td></tr>\n" .
	"<tr><td class=\"date\">Publié le : $date</td></tr>\n" .
	"</table></td></tr>\n";
*/
	echo "<tr>\n<td width=\"60\" align=\"center\">\n" .
	"<img src=\"$url_drapeau\"></td>\n" .
	"<td width=\"200\"><img src=\"$url_image\"></td>" .
	"<td class=$row_class>\n<table border=0 width=\"100%\">\n" .	
	"<tr>\n<td><b>$nom</b></td>" .
	"<td width=\"150\" align=\"right\"><i>$taille</i></td></tr>\n" .
	"<tr><td>$description <br><br>Par : $auteur</td>" .
	"<td rowspan=\"2\" width=\"150\" align=\"right\"><a href=\"$url_download\"><img border=0 src=\"download.gif\"></a></td></tr>\n" .
	"<tr><td class=\"date\">Publié le : $date</td></tr>\n" .
	"</table></td></tr>\n";
}
echo "</table>\n" .
"</table></body></html>";

?>
