<?php
header("Content-type: text/html; charset=utf-8");
//企业ID $userid
/*
$userid = '';
//用户账号 $account
$account = 'yanzheng1';
//用户密码 $password
$password = 'yanzheng123';	//接口密码
//发送到的目标手机号码 $mobile
$mobile = '18268807597';

$sms_code = rand(1000,9999);
//短信内容 $content
$content =urlencode("您好，您的验证码为".$sms_code."，有效期3分钟，请速去填写。【金屋子科技】");


//发送短信（其他方法相同）
//$gateway ="http://42.96.205.165/sms.aspx?action=send&userid={$userid}&account={$account}&password={$password}&mobile={$mobile}&content={$content}&sendTime=";
$gateway ="http://sh2.ipyy.com/sms.aspx?action=send&userid={$userid}&account={$account}&password={$password}&mobile={$mobile}&content={$content}&sendTime=";
$result = file_get_contents($gateway);
$xml = simplexml_load_string($result);
echo "返回状态为：".$xml->returnstatus."<br>";
echo "返回信息：".$xml->message."<br>";
echo "返回余额：".$xml->remainpoint."<br>";
echo "返回本次任务ID：".$xml->taskID."<br>";
echo "返回成功短信数：".$xml->successCounts."<br>";
echo "<br>";
*/

	$account="8T00025";							//改为实际账户名
    $password="8T0002587";							//改为实际短信发送密码
    $mobiles=18268807597;					//目标手机号码，多个用半角“,”分隔
    $content="您好，您的验证码为1234，有效期3分钟，请速去填写。【千嶂网络】";
    $extnumber="";
	$plansendtime='';
	
	$url ="https://dx.ipyy.net/sms.aspx";
	
	$data=array(
			'action'=>'send',
			'userid'=>'',
			'account'=>$account,
			'password'=>$password,
			'mobile'=>$mobiles,
			'extno'=>$extnumber,
			'content'=>$content,
			'sendtime'=>$plansendtime    				
	);
	
	$ch=curl_init();
	//curl_setopt($ch, CURLOPT_URL, self::url);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$result = curl_exec($ch);
	
	curl_close($ch);
	$xml = simplexml_load_string($result);
	var_dump($result);
	echo '<pre>';
	var_dump($xml);
?>
