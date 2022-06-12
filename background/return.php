<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
    <title>归还</title>
</head>
<body align="center">
<h3>选择归还日期</h3><hr>
<html>
<form action="save_return.php" method="POST">
<?php
    $tableName = $_GET["tableName"];
    $primaryKeyName = $_GET["primaryKeyName"];
    $primaryKeyValue = $_GET["primaryKeyValue"];
//    echo $tableName;
//    echo $primaryKeyName;
//    echo $primaryKeyValue;
    echo '<input type="date" name="return" value="">';
    echo '<input type="submit" name="submit" value="还包">';
    echo '<input type="text" name="tableName" style="display:none;" value=' . $tableName . '></input>';
    echo '<input type="text" name="primaryKeyName" style="display:none;" value=' . $primaryKeyName . '></input>';
    echo '<input type="text" name="primaryKeyValue" style="display:none;" value=' . $primaryKeyValue . '></input>';
?>

</html>

