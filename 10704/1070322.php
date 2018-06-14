<?php
$somedata = $_GET['aa'];
echo "^_^";
echo $_GET['ooo'];
echo $_GET['aa'];

$a = "預設值";
if( !isset($_GET['xxx'])){
	echo "請乖乖設定參數xxx";
}else{
	$a = $_GET['xxx'];
}
echo $a;

?>