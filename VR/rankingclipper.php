<html>
<head>
<title>Classement</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?php
$url = "http://clipper.virtualregatta.com/classement/1/ranking/ranking_" . "$num" . ".php";
include($url);
$num_inf = $num - 1;
$num_sup = $num + 1;

echo "<a href='http://ferrovia.free.fr/rankingclipper.php?num=" . "$num_inf" ."'>&lt;&lt;</a>";
echo "<a href='http://ferrovia.free.fr/rankingclipper.php?num=" . "$num_sup" ."'>&gt;&gt;</a>";
?> 
</body>
</html>