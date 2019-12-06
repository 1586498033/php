<?php 
include_once("./class/StringUtils.class.php");
$StringUtils = NEW StringUtils;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>提交到富友交易系统</title>
</head>
<script type="text/javascript">
function submitForm(){
document.getElementById("form").submit();
}
</script>
<?php

try{
	$mchnt_cd = $StringUtils->nvl($_REQUEST[mchnt_cd]);
	$order_id = $StringUtils->nvl($_REQUEST[order_id]);
	$mchnt_key = $StringUtils->nvl($_REQUEST[mchnt_key]);//32位的商户密钥
	$signDataStr = $mchnt_cd . "|" . $order_id . "|" . $mchnt_key;

	$str_md5 = md5($signDataStr);
?>
<body onload="javascript:submitForm();">
<!--支付网关测试环境地址：http://www-1.fuiou.com:8888/wg1_run/smpAQueryGate.do-->
<!--支付网关生产环境地址：https://pay.fuiou.com/smpAQueryGate.do-->
 <form name="pay" method="post" action="http://www-1.fuiou.com:8888/wg1_run/smpAQueryGate.do" id = "form">
<input type="hidden" value = '<?php echo $str_md5; ?>' name="md5"/>
<input type="hidden" value = '<?php echo $mchnt_cd; ?>' name="mchnt_cd"/>
<input type="hidden" value = '<?php echo $order_id; ?>' name="order_id"/>
</form>
</body>
<?php
}catch(Exception $e){
	echo $e->getMessage();
} ?>
<body>
</body>
</html>