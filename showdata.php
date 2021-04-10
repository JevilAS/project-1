<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>عرض بيانات</title>
    <meta charset="UTF-8">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM data";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><td>الرقم</td><td>الرقم</td><td>رقم الرحلة</td><td>موديل الطيارة</td><td>تاريخ الاضافة</td></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["id"]."</td><td>".$row["fnumber"]."</td><td>".$row["model"]."</td><td>".$row["idate"]."</td></tr>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
</body>
</html>