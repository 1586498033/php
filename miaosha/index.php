<?php
//$error_level = error_reporting(0);

phpinfo();
die();

$con = new mysqli('localhost','root','123456','goods');
mysqli_query($con,"set names utf8");
if(!$con){
    echo "数据库连接失败：".mysqli_error();
} 

$sql = "select * from goods where id=1";
$result = mysqli_query($con,$sql);

$res = mysqli_fetch_row($result);

$store = $res[3];	//库存

if($store>0 ){

    sleep(1);

    $sql = "update goods set store=store-1 where id=1";

    if(mysqli_query($con,$sql)){

        echo "更新成功";
    }

}else{
	
    echo "没有库存";
}
