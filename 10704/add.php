<?php
if( !isset($_POST['prod']) || !isset($_POST['price'])
	|| empty($_POST['price'])
	|| empty($_POST['prod']))
{
	
	echo '不對';
	echo '<a href="list.php">回到列表</a>';
	exit;

}

// $db = new PDO('連線字串',帳號,密碼,額外參數);
// $db = new PDO('mysql:host=localhost;dbname=tset0329;charset=utf8'
//		,'sony0415','');
try {
$db = new PDO('mysql:host=localhost;dbname=test0412;charset=utf8'
		,'princerailway','123456', array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

		));
}catch(PDOException $err) {
	echo "ERROR;";
	echo $err->getMessage(); //真實世界不這樣做
	exit;
}

//echo "連線成功";


$stmt = $db->prepare('insert into moneybook (name,cost) values (?,?)');
$stmt->execute([$_POST['prod'],$_POST['price']]);
//echo '新增了';
//echo $stmt->rowCount();
//echo "筆資料";

header('Location: list.php',TRUE, 303);  //沒寫TRUE,303也可以，但是..
?>