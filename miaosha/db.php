<?php
 header("content-type:text/html;charset=utf-8");

 $conn = 'mysql:host=localhost;dbname=anli';
 
 try {
       $pdo = new PDO($conn, 'root', '');
       $pdo->exec("set names utf8");

 } catch (PDOException $e) {
  		exit('数据库连接失败，错误信息：'. $e->getMessage());
 }
 


?>