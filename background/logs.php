<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
    <title>订单信息</title>
</head>
<body align="center">
<h3>订单信息</h3><hr>
<style type = "text/css">
    .mytable{
        margin: 0 auto;
    }
</style>
<table class="mytable"  border="5">
    <?php
    include("conn.php");

    $sql = "show columns from logs";    //sql语句是得到所有表的列
    $result = $conn->query($sql);   //把得到的值交给result
    $columns = array();     //新建一个数组：列
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
    $tableName = "logs";
    // 输出表内容
    $sql = "select * from logs order by `订单编号` desc";    //sql语句是得到表的所有内容
    $result = $conn->query($sql);   //得到所有的值
    $number = $result->num_rows;
    for($i=0; $i<$number; $i++) {
        echo '<tr>';
        $dbrow = $result->fetch_array();
        for($j=0; $j<count($columns); $j++)
            echo '<td>' . $dbrow[$columns[$j]] . '</td>';

        //添加修改和删除两个操作
        if($dbrow[$columns[4]] == NULL)
        {
            echo '<td><a href="return.php?tableName=' . $tableName . '&primaryKeyName=' . $columns[0] . '&primaryKeyValue=' .$dbrow[0] . '"><font color="olive">还包</font></a> ';
            echo '<a href="delete.php?tableName=' . $tableName . '&primaryKeyName=' . $columns[0] . '&primaryKeyValue=' .$dbrow[0] . '"><font color="#dc143c">删除</font></a></td>';
            echo '</tr>';
        }
        else
        {
            echo '<td><a href="delete.php?tableName=' . $tableName . '&primaryKeyName=' . $columns[0] . '&primaryKeyValue=' .$dbrow[0] . '"><font color="#dc143c">删除</font></a></td>';
            echo '</tr>';
        }

    }
    ?>

</table>
<style>td {text-align: center;}</style>
