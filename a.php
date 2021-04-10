<!DOCTYPE html>
<html dir="rtl">
<head>
   <title></title>
   <meta charset="UTF-8">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM data where status=0";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { 
    
	echo 
	"<table><tr><td>الرقم</td><td>رقم الرحلة</td><td>موديل الطيارة</td><td>عدد الركاب</td><td>اتاريخ الاضافة</td></tr>";
	
	while
	($row = mysqli_fetch_assoc($result)) {
	
	echo 
	"<tr><td>".$row["id"]."</td><td>".$row["fnumber"]."</td><td>".$row["model"]."</td><td>".$row["passengers"]."</td><td>".$row["idate"]."</td>
	<td><a href='ok.php?id=".$row["id"]."'>موافقة</a>
	<a href='deny.php?id=".$row["id"]."'>رفض</a>
	</td>
	</tr>";
	
	}
} else {
	echo "لا يوجد طلبات تحتاج الى الموافقة";
}
mysqli_close($conn);
?>
</body>
</html>