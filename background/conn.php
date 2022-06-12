<?php
//连接数据库
$hostname = "localhost";
$database = "ll";
$username = "root";
$password = "gx19918038337";
$conn = mysqli_connect($hostname, $username, $password);
$db = mysqli_select_db($conn, $database);


?>