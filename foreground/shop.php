<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
    <title>包包租赁</title>
</head>

<body align="center">
<h3>包包租赁</h3>
<hr>
</body>


<!--增加一个搜索框，用post方法将输入到搜索框的内容提交给search-->
<div style="text-align:center;vertical-align:middle;">
    <form action="search.php"?type1 method="post">
        <input type="text" name="search" value="" placeholder="请输入品牌名称">
        <input type="submit" name="submit" value="搜索">
</div>
<hr>
<br>
<style type = "text/css">
    .mytable{
        margin: 0 auto;
    }
</style>
<table class="mytable" border="5">
    <?php
    include("conn.php");
    //打印表头（列名）
    $sql = "show columns from bags";
    $result = $conn->query($sql);
    $columns = array();
    if(!$result)
        die("no data");
    $number = $result->num_rows;
    echo '<tr style="background-color:papayawhip">';   //选择一个喜欢的颜色
    for($i=0; $i<$number; $i++) {
        $dbrow = $result->fetch_array(); //得到列名
        echo  '<td>' . $dbrow[0] . '</td>';
        array_push($columns, $dbrow[0]);  //把所有的列名放入数组$columns中
    }
    echo '<td>操作</td>';

    // 输出表内容
    $sql = "select * from bags";    //sql语句是得到表的所有内容
    $result = $conn->query($sql);   //得到所有的值
    $number = $result->num_rows;
    for($i=0; $i<$number; $i++) {
        echo '<tr>';
        $dbrow = $result->fetch_array();
        for($j=0; $j<count($columns); $j++)
        {
            echo '<td>' . $dbrow[$columns[$j]] . '</td>';
        }
        if($dbrow[$columns[count($columns)-1]] >= 1){
            echo '<td><a href="rent.php?primaryKeyName=' . $columns[0] . '&primaryKeyValue=' .$dbrow[0] . '"><font color="olive">我想要租</font></a> ';
        }
        else{
            echo '<td>暂不可租</td>';
        }
        echo '</tr>';
    }
    ?>


</table>
<br>
<hr>
<style>td {text-align: center;}</style>

<div style="text-align:center;">
    <a href="history.php">查询历史订单</a>
</div>

