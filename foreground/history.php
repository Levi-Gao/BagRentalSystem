
<body align="center">
<h3>查询历史订单</h3>
<hr>
</body>
<form action= "history_logs.php" method="get">
<?php

include("conn.php");
// 获取 customers 的数据
$customers = array();
$res = mysqli_query($conn, "select * from customers");
$row = mysqli_num_rows($res);
for($i=0; $i<$row; $i++) {
    $customers[$i] = mysqli_fetch_assoc($res);
}
// 选择客户列表
echo '<td>';
echo '<span class="customer"><select name="customer">';
echo '<option value="-1">请选择编号</option>';
foreach($customers as $c) {
    echo '<option value="' . $c["顾客编号"] . '">     ' . $c["顾客编号"]. '      </option>';
}
echo '<input type="submit" name="submit" value="查询">';
echo '</select></span>';
echo '</td>';

?>