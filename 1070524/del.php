<?php
//error_reporting(0);
//修改 php \ php.ini 中 702 行
// always_populate_raw_post_data = -1
// 可以關掉 $HTTP_RAW_POST_DATA 停用訊息
// 記得要關掉重開php或網頁伺服器
//輸入=======================================================
//預期收到的資料格式  { prod:"商品的名稱", price:"值 }
$data = json_decode(file_get_contents('php://input'));
//檢查你的資料. 暫時省略
//資料庫操作===================================================
try {
	$db = new PDO('mysql:host=localhost;dbname=test0412;charset=utf8'
		,'princerailway','123456', array( 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		) );
}catch(PDOException $err) {
	http_response_code(500);
	echo 'failed';
	//echo $err->getMessage(); //測試的時候用
	exit;
}
$stmt = $db->prepare('delete from moneybook where m_id=?');
$stmt->execute( [ $data->{"id"} ] );
//輸出=======================================================
http_response_code(200);
header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);              //把insert的資料再回傳給用戶端