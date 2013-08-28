<?php

$mid = isset($_GET['id']) ? $_GET['id'] : '_N_O_';
$mid = preg_replace('/[^a-zA-Z0-9_-]+/', '', $mid);
header('Content-type: text/xml; charset=UTF-8');

if (!file_exists("config/$mid.cfg.php")) {
    echo '<map version="1.0.0"></map>';
	exit(1);
}

include "config/$mid.cfg.php";

$time = time();

$xml = "<map version=\"1.0.0\">
	<edge COLOR=\"#336699\" WIDTH=\"4\"/><font size=\"16\" />
	<node TEXT=\"$ROOT\">;
	<edge COLOR=\"#333333\" WIDTH=\"1\"/><font size=\"12\" />
";

$xml .= print_node($TREE);
$xml .= "</node></map>\n";

echo $xml;

function print_node($tree) {
	$xml = '';
	global $time;
	foreach($tree as $key => $val) {
        if (is_array($val)) {
			$xml .= "\t<node CREATED=\"$time\" MODIFIED=\"$time\" TEXT=\"$key\">\n";
			$xml .= print_node($val);
			$xml .= "\t</node>\n";
		} else {
			if (substr($val, 0, 2) == '10') {
				$val = gethostbyaddr($val);
				$val = str_replace(array('passport', '.baidu.com'), array('pass', ''), $val);
			}
			$xml .= "\t<node CREATED=\"$time\" MODIFIED=\"$time\" TEXT=\"$val\" />\n";
		}
	}
	return $xml;
}
?>
