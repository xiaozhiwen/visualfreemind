<?php

$dir = 'config';
$mod = array();
$dh = opendir($dir);
while ($f = readdir($dh)) {
	if ($f == '.' || $f == '..') continue;
	if (is_dir("$dir/$f")) continue;
	$mod[] = substr($f, 0, strpos($f, '.'));
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
<title>NS - PASS - INDEX</title>
<style>body{margin:0px; padding:0px}</style>
</head>
<body style="margin-left:100px; margin-top:50px;">
<h1><ol>
<?php
	foreach ($mod as $val) {
?>
<li><a href="v.php?id=<?php echo $val?>" target="blank"><?php echo $val?></a>
<?php } ?>
</ol>
</h1>
</body>
</html>
