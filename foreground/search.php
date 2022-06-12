<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
    <title>品牌</title>
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
    include("conn.php");
    $search = $_POST['search'];   //接收搜索框中的内容

    //输出表头
    $sql = "show columns from bags";
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

    //得到查询结果
    $sql = "CALL search('$search')";  //调用搜索存储过程
    $result = $conn->query($sql);   //得到所有的值
    $number = $result->num_rows;
    if($number == 0)        //如果搜索内容为空
        echo "<script>window.alert('请检查输入品牌名称是否正确');history.back(1);</script>";
    for ($i = 0; $i < $number; $i++) {
        echo '<tr>';
        $dbrow = $result->fetch_array();
        for ($j = 0; $j < count($columns); $j++) {
            echo '<td>' . $dbrow[$columns[$j]] . '</td>';
        }
        if($dbrow[$columns[count($columns) - 1]] >= 1){
            echo '<td><a href="rent.php?primaryKeyName=' . $columns[0] . '&primaryKeyValue=' . $dbrow[0] . '"><font color="olive">我想要租</font></a> ';
        }
        else
            echo '<td>暂不可租</td>';
        echo '</tr>';
    }
    ?>

</table>
<style>td {text-align: center;}</style>


