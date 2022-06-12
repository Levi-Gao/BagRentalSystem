<?php
include("conn.php");

$tableName = $_GET['tableName'];
$primaryKeyName = $_GET['primaryKeyName'];
$primaryKeyValue = $_GET['primaryKeyValue'];


$sql = "delete from $tableName where `$primaryKeyName` = '$primaryKeyValue' ";
$res = $conn->query($sql);


//包包表的删除要求，当该包存在订单信息时，即在logs表有记录时，不可以删除
if($tableName == "bags"){
    if($res)
        echo "<script language=javascript>window.alert('删除成功,请返回');history.back(1);</script>";
    else
        echo "<script language=javascript>window.alert('无法删除,此包包存在订单信息');history.back(1);</script>";
}

//顾客表的删除要求，当该顾客存在订单信息时，即在logs表有记录时，不可以删除
if($tableName == "customers"){
    if($res)
        echo "<script language=javascript>window.alert('删除成功,请返回');history.back(1);</script>";
    else
        echo "<script language=javascript>window.alert('无法删除,此客户存在订单信息');history.back(1);</script>";
}

if($tableName == "logs"){
    if($res){
        echo "<script language=javascript>window.alert('删除成功,请返回');history.back(1);</script>";
    }
    else
        echo "<script language=javascript>window.alert('删除失败');history.back(1);</script>";
}

?>
