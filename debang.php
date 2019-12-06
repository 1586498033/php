<?php
header("Content-type: text/html; charset=utf-8");
$uri = "http://58.40.17.67/dop/order/traceOrder.action";

$time = explode ( " ", microtime () );  
$time = $time [1] . ($time [0] * 1000);  
$time2 = explode ( ".", $time );  
$timestamp = $time2 [0];  
$appkey='d370497e997ac86ef47273ef2ea257c4';
$bianma='EWBSHMFDZKCYXGS';	//companyCode
$parmas='{"logisticCompanyID":"DEPPON","orders":[{"mailNo":"5456464646"}]}';

/*$parmas=array("logisticCompanyID"=>"DEPPON",
			  "orders"=>array(array("mailNo"=>"5456464646")));*/

//$parmas=json_encode($parmas);
$digest=base64_encode(MD5($parmas.$appkey.$timestamp));

//echo $bianma."<br>";
//echo $parmas."<br>";
//echo $digest."<br>";
//echo $timestamp."<br>";

$data = array (
	'companyCode'=> $bianma,
	'parmas'=> $parmas,
	'digest'=> $digest,
	'timestamp'=> $timestamp
);

$ch = curl_init();//初始化curl
curl_setopt($ch, CURLOPT_URL,$uri);//访问地址
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//是否自动输出内容
curl_setopt($ch, CURLOPT_POSTFIELDS, $data );
$result=curl_exec($ch);
curl_close($ch); 
echo $result;



?>