<?php
//phpinfo();
$redis = new Redis();

$redis->connect('127.0.0.1', 6379);

$redis->set('name', "林路同");

/**
 * 给销量加锁,$sales可以看作虚拟库存
 * 如真实库存$store为100,99...2,1,0
 * 则虚拟库存$sales为0,1,2...99,100
 */
$sales = 'sales';	
$redis->watch('sales');

$store = 100; //秒杀库存
if($store >= 100){
	exit('秒杀已结束');
}

//开启事务
$redis->multi();
$redis->incr($sales);	//增加虚拟库存
$res = $redis->exec(); //执行事务

if($res){
	//扣库存操作
	//这里处理自己的业务
	
	
	//演示则操作mysql数据库
	include 'db.php';
	$sql = "update goods set store = store - 1 where id=1";
	if($pdo->exec($sql)){
		echo '抢购成功';
	}
} else{
	exit('秒杀失败');
}

