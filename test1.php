<?php
header("Content-type: text/html; charset=utf-8");
$conn = mysqli_connect("localhost","root","123456","test");
if (!$conn){
	die('Could not connect: ' . mysqli_connect_error());
}


/*for($i=1;$i<=10000;$i++){
	$username = '林路同'.$i;
	$sex = ($i % 2 == 0) ? '男':'女';
	$real_name = '林路同'.$i;
	$create_time = time() + $i;
	
	//插入数据
	$sql = "INSERT INTO llt_member (username, sex, real_name, create_time) VALUES ('".$username."', '".$sex."', '".$real_name."', ".$create_time.")";
	mysqli_query($conn, $sql);
}*/

$result = mysqli_query($conn,"select * from llt_member limit 10");

echo '<pre>';
var_dump($result);
//var_dump($result->num_rows);
while ($row = mysqli_fetch_assoc($result))
{
	echo "question_title : {$row['username']} <br>";
	echo "answer_content1: {$row['sex']} <br>";
}


mysqli_close($conn);