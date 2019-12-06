<?php

$con = mysql_connect("47.100.6.204","p2p","p2p!@#456");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}else{
	echo '连接成功';
}

mysql_close($con);
