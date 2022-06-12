<?php
include("conn.php");
$tableName = $_GET["tableName"];

//获取字段名并且构造sql语句
//需要构造的sql语句是insert into tableName （列名1，列名2，列名3...）  values （列名1的值，列名2的值，列名3的值...）
$query = 'insert into ' . $tableName . ' (';//构造的sql语句有括号，因此写$query时要添加左括号（和右括号）
$res = mysqli_query($conn, "show columns from " . $tableName);//得到列名
$row = mysqli_num_rows($res);
$columns = array(); // 记录列名称
//将列名加入到sql语句中
for ($i = 0; $i < $row; $i++) {
    $cname = mysqli_fetch_array($res)[0];
    array_push($columns, $cname);
    $query = $query . $cname . ',';
}

$query = substr($query, 0, strlen($query) - 1);   // 去掉最后一个值多出的,号
$query = $query . ') values (';   //补充sql语句

//将列的值加入到sql语句中
for ($i = 0; $i < count($columns); $i++) {
    $cname = $columns[$i];
    $query = $query . '"' . $_GET[$cname] . '",';
}
$query = substr($query, 0, strlen($query) - 1);   // 去掉最后一个值多出的,号
$query = $query . ')'; //sql语句完成

// 执行修改sql
$res = mysqli_query($conn, $query);
if ($res)
    echo "<script>window.alert('添加成功,请返回');history.back(1);</script>";
else
    echo "<script>window.alert('添加失败,请返回');history.back(1);</script>";

