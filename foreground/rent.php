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
<style type = "text/css">
    .mytable{
        margin: 0 auto;
    }
</style>
<table class="mytable" border="5">
    <?php
    echo '<form method="GET" action="save_logs.php"><div>';
    include("conn.php");
    //$index = array();
    //$flag =0;
    $primaryKeyName = $_GET["primaryKeyName"];
    $primaryKeyValue = $_GET["primaryKeyValue"];

    // 获取 customers 的数据
    $customers = array();
    $res = mysqli_query($conn, "select * from customers");
    $row = mysqli_num_rows($res);
    for($i=0; $i<$row; $i++) {
        $customers[$i] = mysqli_fetch_assoc($res);
    }

    // 打印表头
    $columns = array();
    $res = mysqli_query($conn, "show columns from logs" );
    if(!$res)
        die("no data");
    $row = mysqli_num_rows($res);
    echo '<tr style="background-color:papayawhip">';
    for($i=0; $i<$row; $i++) {

            $dbrow = mysqli_fetch_array($res);
            if($dbrow[0] != "归还日期" &&$dbrow[0] != "订单编号") {
                echo '<td>' . $dbrow[0] . '</td>';
                array_push($columns, $dbrow[0]);
            }
    }

    echo '<td>操作</td>';
    echo '</tr>';

    // 选择客户列表

    echo '<td>';
    echo '<span class="customer"><select name="customer">';
    echo '<option value="-1">请选择</option>';
    foreach($customers as $c) {
        echo '<option value="' . $c["顾客编号"] . '">     ' . $c["顾客编号"]. '      </option>';
    }
    echo '</select></span>';
    echo '</td>';

    echo '<td>';
    echo $primaryKeyValue;
    echo '</td>';
//    $index[$flag++] =   $primaryKeyValue;

    echo '<td>';
    echo date('Y-m-d', time()); // 输出当前时间
    echo '</td>';
    //$index[$flag++] = date('Y-m-d', time());

    echo '<td>';
    echo '<span class="customer"><select name="保险状态">';
    echo '<option value="-1">请选择</option>';
    $arr = array("0","1");
    foreach ($arr as $v){
        echo "<option value = '".$v. "'> ".$v." </option>";
    }
    echo '</select></span>';
    echo '</td>';

    echo '<td>';
    echo '<input type="submit" value="下单">';
    echo '</td>';

    echo '<input type="text" name="primaryKeyValue" style="display:none;" value=' . $primaryKeyValue . '></input>';
    echo "注意：保险状态选择 0 为不购买保险，1 为购买保险";
    ?>
</table>
<style>td {text-align: center;}</style>