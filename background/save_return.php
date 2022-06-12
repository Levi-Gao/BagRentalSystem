<?php
include("conn.php");

$tableName = $_POST["tableName"];
$primaryKeyName = $_POST["primaryKeyName"];
$primaryKeyValue = $_POST["primaryKeyValue"];
$search = $_POST['return'];
//检测归还日期是否大于租出日期
$sql = "select `租出日期` from logs where `$primaryKeyName`  =   '$primaryKeyValue'";
$res = $conn->query($sql);
$dbrow = $res->fetch_array();
if($dbrow[0] >= $search)
    echo "<script>window.alert('请检查输入归还日期是否正确');history.back(1);</script>";
else{
    $query = "update logs set `归还日期` = '$search' where `$primaryKeyName`  =   '$primaryKeyValue'   ";
    $res = $conn->query($query);

    //得到一共租了多少天
    $sql1 = "select DATEDIFF(`归还日期`,`租出日期`) from logs where `$primaryKeyName`  =   '$primaryKeyValue'";
    $res1 = $conn->query($sql1);
    $dbrow1 = $res1->fetch_array();

    //得到是否买保险的信息
    $sql2 = "select `保险状态` from logs where `$primaryKeyName`  = '$primaryKeyValue'";
    $res2 = $conn->query($sql2);
    $dbrow2 = $res2->fetch_array();

    //得到该包包的名字
    $sql3 = "select `包包编号` from logs where `$primaryKeyName`  = '$primaryKeyValue'";
    $res3 = $conn->query($sql3);
    $dbrow3 = $res3->fetch_array();

    //得到该包包的单价
    $sql4 = "select `价格（天）` from bags where `包包编号`  = '$dbrow3[0]'";
    $res4 = $conn->query($sql4);
    $dbrow4 = $res4->fetch_array();

    if($dbrow2[0] == 1)//如果买了保险，单价加一元
    {
        $money = $dbrow1[0] * ($dbrow4[0]+1);
        echo "<script>window.alert('该顾客一共租了 $dbrow1[0] 天\\n已购买保险\\n总费用为 $money 元');history.back(1);</script>";
    }
    else//如果没买保险，单价8元
    {
        $money = $dbrow1[0] * $dbrow4[0];
        echo "<script>window.alert('该顾客一共租了 $dbrow1[0] 天\\n未购买保险\\n总费用为 $money 元');history.back(1);</script>";
    }
}




