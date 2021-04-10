<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>حذف</title>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5; URL=search.php" />
</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$id=$_GET["id"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "delete FROM data where id='$id'";
$result = mysqli_query($conn, $sql);
echo "تم حذف البيانات";
?>
</body>
</html>