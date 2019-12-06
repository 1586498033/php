<?php
//phpinfo();


/**
 * 限制单位时间内用户的访问次数
 * 方案一：redis 计数法（incr），缺点：无法解决单位时间内只能访问5次，比如第1秒，到第18~20访问了4次秒，这时过了20秒，第21秒又可以连续访问5次
 * 方案二：redis 队列（lpush），优：可以解决单位时间内只能访问5次。完全解决单位时间只能访问5次
 */
 
//方案一
function index($limit = 5, $timeSec = 20){
	$redis = new Redis();
	$redis->connect('127.0.0.1', 6379);
	//var_dump($redis->get('name'));exit();
	$ip = $_SERVER['REMOTE_ADDR'];

	$check = $redis->exists($ip);
	if($check){
		$num = $redis->incr($ip);
		
		if($num > $limit){
			exit('请求过于频繁');
		}
	} else{
		$redis->incr($ip);	//如果 key 不存在，那么 key 的值会先被初始化为 0 ，然后再执行 INCR 操作
		
		$redis->expire($ip, $timeSec);	//给用户设置过期时间 
		
		//处理业务逻辑代码
		//echo '请浏览我们的网站';
	}
	
	$num = $redis->get($ip);
	
	echo "第".$num."次浏览我们的网站";
}

//index();

//方案二
function lpush($limit = 5, $timeSec = 20){
	$redis = new Redis();
	$redis->connect('127.0.0.1', 6379);
	//var_dump($redis->get('name'));exit();
	$ip = $_SERVER['REMOTE_ADDR'];

	if($redis->lLen($ip) < $limit){
		$redis->lpush($ip, time());
		
		$redis->expire($ip, $timeSec);	//设置过期时间 
		
		echo '正常访问';
	} else{
		$lastTime = $redis->lIndex($ip, 0); //获取最近一次的访问时间
		
		if((time() - $lastTime) < $timeSec){
			exit('请求过于频繁');
		}
	}
}

lpush();


