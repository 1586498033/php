<?php
include 'word.class.php';
	
$html = ' 
<h1>你好啊</h1> 
<h2>欢迎光临<a href="http://www.dawnfly.cn">破晓博客</a></h2>
<img src="http://www.dawnfly.cn/Source/home/top_ad.jpg" alt="">
';
 
    $word = new word();
    $word->start(); 
    $wordname = "欢迎光顾破晓博客网站，技术交流与学习的平台.doc"; 
    $wordname = iconv('UTF-8','GBK',   $wordname);//防止乱码
    $html=iconv('UTF-8','GBK',  $html); //防止乱码
    echo $html;
	if(!$word->save($wordname)){ //可以自定义保存路径
		echo 1;
	}else{
		echo 2;
	}
    ob_flush();//每次执行前刷新缓存 
    flush();
?>