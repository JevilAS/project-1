<!DOCTYPE html>
<html dir="rtl">
<head>
         <title>الطيارات</title>
		 <meta charset="UTF-8">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "loclhost";
$username = "root";
$password = "";
$dbname = "project";	
$model= test_input($_POST["model"]);	
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("فشل الأرسال: " . mysqli_connect_error());
}
$sql = "SELECT * FROM modle where mname='$model'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
echo "تم تسجيلة مسبقاً";    
} else {
$sql = "INSERT INTO modle (mname) VALUES ('$model')";
if (mysqli_query($conn, $sql)) {
    echo "تم اضافة الموديل";
    echo "<br>رقم الاضافة هو : ".mysqli_insert_id($conn);
} else {
    echo "يوجد خطأ: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);    
}else{
     ?>
    <form action="" method="post">
     <input model="model" type="text" placeholder="موديل الطيارة">
 <br>
    
    <input type="submit">
    
    </form>
    <?php
    }
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;	

}

?>
</body>


</html>