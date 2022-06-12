<?php
include("conn.php");
$tableName = $_GET["tableName"];
$primaryKeyName = $_GET["primaryKeyName"];
$primaryKeyValue = $_GET["primaryKeyValue"];

// 获取字段名并且构造sql语句
$query = 'update ' . $tableName . ' set ';
$res = mysqli_query($conn, "show columns from " . $tableName);
$row = mysqli_num_rows($res);

for($i=0; $i<$row; $i++) {
    $cname = mysqli_fetch_array($res)[0];
    $query = $query . $cname . '="' . $_GET[$cname] . '",';
}

$query = substr($query, 0, strlen($query)-1);   // 去掉,号
$query = $query . ' where ' . $primaryKeyName . '="'.$primaryKeyValue.'" ';


$res = $conn->query($query);
if($res)
    echo "<script>window.alert('修改成功,请返回');history.back(1);</script>";
else{
    if($tableName == "customers")
        echo "<script>window.alert('您不可以更改顾客编号！\\n注意：如果顾客编号有误请重新添加顾客信息，并将错误顾客信息删除！');history.back(1);</script>";
    else
        echo "<script>window.alert('注意：您不可以更改包包编号！');history.back(1);</script>";
}



?>
