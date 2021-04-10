<!DOCTYPE html>
<html dir="rtl">
<head>
    <title></title>
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
    $pid=$_POST["Planes];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$conn) {
        die("فشل الاتصال ". mysqli_connect_error());
    }
      $id=$_GET["id"];

    $sql = "update data set id='$id' ,fnumber='$fnumber',model='$model' where id= $id";
    if (mysqli_query($conn, $sql)) {
        echo "تم تحديث سجل البيانات بنجاح";

    } else {
        echo "خطأ: " . $sql . "<br>" . mysqli_error($conn);

    }
    mysqli_close($conn);
}else{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";
    $id=$_GET["id"];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM data where id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);



    ?>
    <form action="" method="post">
        <input name="id" type="text" placeholder="الرقم" value="<?php echo $row["id"]; ?>">
        <br>
        <input name="fnumber" type="text" placeholder="رقم الرحلة" value="<?php echo $row["fnumber"]; ?>">
        <br>
        <input name="model" type="text" placeholder="موديل الطيارة"value="<?php echo $row["model"]; ?>">
        <br>
        <select name="Planes">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "project";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $sql = "SELECT * FROM Planes ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value='".$row["pid"]."'>".$row["pname"]."</option>";
            }
            ?>
        </select>
        <input type="submit" value="تحديث">

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