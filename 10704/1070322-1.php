<?php

if( !isset($_GET['aa']) || !isset($_GET['bb']) ){
	echo "需要完整的兩個值";
	exit;
}
if( !is_numeric($_GET['aa']) || !is_numeric($_GET['bb']) ){
	echo "需要兩個數值";
	exit;
}

$x = $_GET['aa'];
$y = $_GET['bb'];

$z = $x+$y;

echo $z;

?>