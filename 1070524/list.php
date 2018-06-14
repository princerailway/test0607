<?php
//輸入


//輸出
try {
$db = new PDO('mysql:host=localhost;dbname=test0524;charset=utf8'
		,'princerailway','123456', array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

		));
}catch(PDOException $err) {
	http_response_code(500);
	echo "ERROR;";
	//echo $err->getMessage(); //測試時候用
	exit;
}
//查詢
$stmt = $db->prepare('select * from moneybook');
$stmt->excute();
//輸出
$data = array();

while($row = $stmt->fetch()){ //小心，此處的=號是把右邊的值儲存往左側
$data[] = (object)
	[
		'prod' => $row['name'],
		'price' => $row['cost'],
		'id' => $row['m_id']
	]
	
}

http_response_code(200);
//header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);  //把查詢資料傳回用戶端

