<?php
include("conn.php");

// 自动生成随机用户名
// 测试，循环创建1万个随机账号，0碰撞，10万大约0-3个碰撞，足够应付未来数十亿级PV
$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$username = "";
for ( $i = 0; $i < 6; $i++ )
{
    $random=mt_rand(0,strlen($chars)-1);
    $username .= $chars[$random];
}
$name = strtoupper(base_convert(time() - 1420070400, 10, 36)).$username;


$query = 'INSERT into logs(订单编号,顾客编号,包包编号,租出日期,保险状态) values (';
$select_value=$_GET['customer'];

$query = $query . '"'.$name.'"'. ',';
$query = $query . '"'.$select_value.'"'. ',';


$primaryKeyValue = $_GET["primaryKeyValue"];
$query = $query . $primaryKeyValue. ',' . '"'.date('Y-m-d', time()).'"'. ',';


$select_value=$_GET['保险状态'];
$query = $query . $select_value. ')';

if($select_value>=0)
{
    $res = mysqli_query($conn, $query);
    echo "<script>window.alert('租赁成功');history.back(2);</script>";
}
else
        echo "<script>window.alert('租赁失败，请选择');history.back(1);</script>";



echo "<td>";
//echo $query;