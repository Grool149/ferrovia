<?php

include('config.php');
include('mysql.php');

include("header.inc");

$db = new sql_db($dbhost, $dbuser, $dbpasswd, $dbname, false);

$sql = "SELECT * FROM materiel_elements";

if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Could not obtain type information", '', __LINE__, __FILE__, $sql);
}

$num_rows = mysql_num_rows($result);

echo "$num_rows\n";

/*echo "<br>1: " . $result;
echo "<br>2: " . count($result);
echo "<br>3: " . $result[0];
echo "<br>4: " . $result('Count(*)');

$toto=$db->sql_fetchrow($result);
echo "<br>5: " . $toto;
echo "<br>6: " . count($toto);
echo "<br>7: " . $toto[0];
echo "<br>8: " . $toto('Count(*)');
*/

$db->sql_close()
?>

</body></html>