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
	$mchnt_cd = $StringUtils->nvl($_REQUEST['mchnt_cd']);
	$order_id = $StringUtils->nvl($_REQUEST['order_id']);
	$order_amt = $StringUtils->nvl($_REQUEST['order_amt']);
	$order_pay_type = $StringUtils->nvl($_REQUEST['order_pay_type']);
	$page_notify_url = $StringUtils->nvl($_REQUEST['page_notify_url']);
	$back_notify_url = $StringUtils->nvl($_REQUEST['back_notify_url']);
	$order_valid_time = $StringUtils->nvl($_REQUEST['order_valid_time']);
	$iss_ins_cd = $StringUtils->nvl($_REQUEST['iss_ins_cd']);
	$goods_name = $StringUtils->nvl($_REQUEST['goods_name']);
	$goods_display_url = $StringUtils->nvl($_REQUEST['goods_display_url']);
	$rem = $StringUtils->nvl($_REQUEST['rem']);
	$ver = $StringUtils->nvl($_REQUEST['ver']);
	$mchnt_key = $StringUtils->nvl($_REQUEST['mchnt_key']);//32位的商户密钥

	/*String signDataStr = mchnt_cd + "|" + order_id+ "|" +order_amt+ "|" +order_pay_type+ "|" +
 
                    page_notify_url+ "|" +back_notify_url+ "|" +order_valid_time+ "|" +

                     iss_ins_cd+ "|" +goods_name+ "|" +goods_display_url+ "|" 
 +rem+ "|" +ver+ "|" + mchnt_key;*/
	
	$signDataStr = $mchnt_cd . "|" . $order_id . "|" . $order_amt . "|" . $order_pay_type . "|" .
                     $page_notify_url . "|" . $back_notify_url . "|" . $order_valid_time . "|" .
                     $iss_ins_cd . "|" . $goods_name . "|" . $goods_display_url . "|" . $rem . "|" . $ver . "|" . $mchnt_key;
                     
	$str_md5 = md5($signDataStr);

?>
<body onload="javascript:submitForm();">
<!--支付网关测试环境地址：http://www-1.fuiou.com:8888/wg1_run/smpGate.do-->
<!--支付网关生产环境地址：https://pay.fuiou.com/smpGate.do-->
	<form name="pay" method="post" action="https://pay.fuiou.com/dirPayGate.do" id = "form">
		<input type="hidden" value = '<?php echo $str_md5; ?>' name="md5"/>
		<input type="hidden" value = '<?php echo $mchnt_cd; ?>' name="mchnt_cd"/>
		<input type="hidden" value = '<?php echo $order_id; ?>' name="order_id"/>
		<input type="hidden" value = '<?php echo $order_amt; ?>' name="order_amt"/>
		<input type="hidden" value = '<?php echo $order_pay_type; ?>' name="order_pay_type"/>
		<input type="hidden" value = '<?php echo $page_notify_url; ?>' name="page_notify_url"/>
		<input type="hidden" value = '<?php echo $back_notify_url; ?>' name="back_notify_url"/>
		<input type="hidden" value = '<?php echo $order_valid_time; ?>' name="order_valid_time"/>
		<input type="hidden" value = '<?php echo $iss_ins_cd; ?>' name="iss_ins_cd"/>
		<input type="hidden" value = '<?php echo $goods_name; ?>' name="goods_name"/>
		<input type="hidden" value = '<?php echo $goods_display_url; ?>' name="goods_display_url"/>
		<input type="hidden" value = '<?php echo $rem; ?>' name="rem"/>
		<input type="hidden" value = '<?php echo $ver; ?>' name="ver"/>
	</form>
</body>
<?php
}catch(Exception $e){
	echo $e->getMessage();
} ?>
<body>
</body>
</html>