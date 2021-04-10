<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>تسجيل</title>
    <meta charset="UTF-8">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";
    $id=test_input($_POST["id"]);
    $model=test_input($_POST["model"]);
    $fnumber=test_input($_POST["fnumber"]);
    $pid=$_POST["Planes"];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("فشل الإتصال: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM data where fnumber='$fnumber'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "تم التسجيل مسبقاً";
    } else {
        $sql = "INSERT INTO data (id,fnumber,model,pid) VALUES ('$id', '$fnumber','$model',$pid)";
        if (mysqli_query($conn, $sql)) {
            echo "تم اضافة سجل البيانات بنجاح";
            echo "<br>رقم الطلب هو : ".mysqli_insert_id($conn);
        } else {
            echo "خطأ: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}else{
    ?>
    <form action="" method="post">
        <input name="id" type="text" placeholder="الرقم">
        <br>
        <input name="fnumber" type="text" placeholder="رقم الرحلة">
        <br>
        <input name="model" type="text" placeholder="موديل الطيارة">
        <br>
        <select name="Planes">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "project";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $sql = "SELECT * FROM Planes";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value='".$row["pid"]."'>".$row["pname"]."</option>";
            }
            ?>
        </select>
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