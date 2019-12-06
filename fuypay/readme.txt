1 网银支付 
主要参考 order.php  ---->  orderSend.php  ----> orderResult.php
order.php 主要是订单信息
orderSend.php 主要是请求富友支付接口
orderResult.php 就是支付完成后,银行通知富友,富友通知商户的参数

2  跨境支付(支持多币种,比如:港币\美元等境外商户)
order_kuajing.php  ----> orderSend_kuajing.php