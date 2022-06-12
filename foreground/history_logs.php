<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
    <title>顾客信息</title>
</head>
<body align="center">
<h3>客户历史订单</h3><hr>
<style type = "text/css">
.mytable{
    margin: 0 auto;
}
</style>

<table class="mytable"  border="5">
    <?php
    $select_value=$_GET['customer'];
    include("conn.php");
    //手动输入各个列名
    $columns = array();

    $sqll = "select `姓`,`名` from customers where `顾客编号`  = '$select_value'";
    $ress = $conn->query($sqll);
    $dbroww = $ress->fetch_array();

    echo "顾客编号为$select_value,姓为$dbroww[0],名为$dbroww[1]";
   // $columns[0] = "顾客编号";
    $columns[0] = "品牌";
    $columns[1] = "设计师";
    $columns[2] = "租包天数";
    $columns[3] = "花费";
    echo '<tr style="background-color:papayawhip">';   //选择一个喜欢的颜色
    for($i=0; $i<count($columns); $i++)
    {
        echo '<td> '.$columns[$i].' </td>  ';
    }


    //得到一共租了多少天
    $sql1 = "select logs.`订单编号`,bags.`品牌`,bags.`设计师`,DATEDIFF(logs.`归还日期`,logs.`租出日期`) AS 租包天数 FROM customers,bags,logs WHERE `logs`.`顾客编号` = '$select_value' AND `logs`.`顾客编号` = customers.`顾客编号` AND `logs`.`包包编号` = bags.`包包编号` and DATEDIFF(logs.`归还日期`,logs.`租出日期`)>0";
    $res1 = $conn->query($sql1);
    $number = $res1->num_rows;
    $total = 0;
    for($i=0; $i<$number; $i++) {

        echo '<tr>';
        $dbrow = $res1->fetch_array();
        //一行一行输出表的内容
        for($j=0; $j<count($columns)-1; $j++)
        {

            echo '<td>' . $dbrow[$columns[$j]] . '</td>';
        }
        //得到是否买保险的信息
        $sql2 = "select `保险状态` from logs where `订单编号`  = '$dbrow[0]'";
        $res2 = $conn->query($sql2);
        $dbrow2 = $res2->fetch_array();

        //得到该包包的编号
        $sql3 = "select `包包编号` from logs where `订单编号`  = '$dbrow[0]'";
        $res3 = $conn->query($sql3);
        $dbrow3 = $res3->fetch_array();

        //得到该包包的单价
        $sql4 = "select `价格（天）` from bags where `包包编号`  = '$dbrow3[0]'";
        $res4 = $conn->query($sql4);
        $dbrow4 = $res4->fetch_array();

        if($dbrow2[0] == 0){
            $money = $dbrow[$columns[2]] * $dbrow4[0];
            echo '<td>'.$money.'</td></tr>';
        }
        else{
            $money = $dbrow[$columns[2]] * ($dbrow4[0]+1);
            echo '<td>'.$money.'</td></tr>';
        }
        $total = $total + $money;

    }


    echo ",总共消费了 $total 元";
    ?>

