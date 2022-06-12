<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
    <title>豪包租赁</title>
</head>
<body align="center">
<h3>包包信息</h3><hr>
<style type = "text/css">
    .mytable{
        margin: 0 auto;
    }
</style>
<form action="add.php" method="GET">
<table class="mytable" border="5">
    <?php
    include("conn.php");
    //输出表头
    $tableName = "bags";
    $sql = "show columns from bags";    //得到表的列名
    $result = $conn->query($sql);
    $columns = array();     //记录列名
    if(!$result)
        die("no data");
    $number = $result->num_rows;    //得到了列的个数
    echo '<tr style="background-color:papayawhip">';   //选择一个喜欢的颜色
    for($i=0; $i<$number; $i++) {
        $dbrow = $result->fetch_array();
        echo  '<td>' . $dbrow[0] . '</td>';
        array_push($columns, $dbrow[0]);  //把所有的列名放入数组$columns中
    }
    echo '<td>操作</td>';


    // 输出表内容
    $sql = "select * from bags";    //sql语句是得到表的所有内容
    $result = $conn->query($sql);
    $number = $result->num_rows;

    for($i=0; $i<$number; $i++) {
        echo '<tr>';
        $dbrow = $result->fetch_array();
        //一行一行输出表的内容
        for($j=0; $j<count($columns); $j++)
        {
            echo '<td>' . $dbrow[$columns[$j]] . '</td>';
        }
        //添加修改和删除两个操作，传出的参数是表名、主键名字和主键的值
        echo '<td><a href="edit.php?tableName=' . $tableName . '&primaryKeyName=' . $columns[0] . '&primaryKeyValue=' .$dbrow[0] . '"><font color="olive">修改</font></a> ';
        echo '<a href="delete.php?tableName=' . $tableName . '&primaryKeyName=' . $columns[0] . '&primaryKeyValue=' .$dbrow[0] . '"><font color="#dc143c">删除</font></a></td>';
        echo '</tr>';
    }
    echo '<tr style="background-color:purple">';
    //加入添加add操作
    for($j=0; $j<count($columns); $j++) {
        echo '<td><input type="text" name="' . $columns[$j] . '" style="width:120;"></input></td>';
    }
    echo '<td><input type="submit" style="width: 120px"; value="添加记录"></td>';
    echo '<input type="text" name="tableName" style="display:none;" value="bags"></input>';
    echo '</tr>';

    ?>
</table>
<style>td {text-align: center;}</style>