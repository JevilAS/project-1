<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>بحث</title>
    <meta charset="UTF-8">
</head>
<body>
<form action="" method="post">
    <input type="number" name="id" placeholder="الرقم" >
    <input type="number" name="fnumber" placeholder="رقم الرحلة" >
    <input type="text" name="model" placeholder="موديل الطيارة" >
    <input type="submit" value="بحث">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";
    $id=$_POST["id"];
    $fnumber=$_POST["fnumber"];
    $model=$_POST["model"];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM data where name LIKE '%$id%' or fnumber LIKE '%$fnumber%' or model LIKE '%$model%' and status=1 order by name DESC ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><td>الرقم</td><td>الرقم</td><td>رقم الرحلة</td><td>موديل الطيارة</td><td>تاريخ الاضافة</td><td></td></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["id"]."</td><td>".$row["fnumber"]."</td><td>".$row["model"]."</td><td>".$row["idate"]."</td><td><a href='edit.php?id=".$row["id"]."'> تعديل </a><a href='del.php?id=".$row["id"]."'> حذف </a></td></tr>";
        }
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
}
?>

</body>
</html>