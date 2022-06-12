<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
    <title>顾客信息</title>
</head>
<body align="center">
<h3>优质客户信息</h3><hr>
<style type = "text/css">
.mytable{
    margin: 0 auto;
}
</style>

<table class="mytable"  border="5">
    <?php
    include("conn.php");
    //手动输入各个列名
    $columns = array();
    $columns[0] = "顾客编号";
    $columns[1] = "姓";
    $columns[2] = "名";
    $columns[3] = "住址";
    $columns[4] = "移动电话";
    $columns[5] = "租包次数";
    $columns[6] = "租包总天数";


    echo '<tr style="background-color:papayawhip">';   //选择一个喜欢的颜色
    for($i=0; $i<count($columns); $i++)
    {
        echo '<td> '.$columns[$i].' </td>  ';
    }


    // 输出表内容
    $sql = "CALL better_customers";
    $result = $conn->query($sql);
    $number = $result->num_rows;
    for($i=0; $i<$number; $i++) {
        echo '<tr>';
        $dbrow = $result->fetch_array();
        for($j=0; $j<count($columns); $j++)
        {
            echo '<td>' . $dbrow[$j] . '</td>';
        }
        echo '</tr>';
    }
    ?>
</table>
<style>td {text-align: center;}</style>

