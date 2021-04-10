<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>موافقة</title>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0; URL=approval.php" />
</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$id=$_GET["id"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "update data set status=1 where id='$id'";
$result = mysqli_query($conn, $sql);
echo "تم الموافقة ";
?>
</body>
</html>