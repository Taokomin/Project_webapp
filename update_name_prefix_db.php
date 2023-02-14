<?php
require('condb.php');

$prefix_number = $_POST["prefix_number"];
$prefix_id = $_POST["prefix_id"];
$prefix_name = $_POST["prefix_name"];

$sql = "UPDATE tb_nameprefix SET prefix_id = '$prefix_id', prefix_name = '$prefix_name' WHERE prefix_number = '$prefix_number'";


$result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
    echo "window.location.href='name_prefix.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
    echo "window.location.href='update_name_prefix.php';";
    echo "</script>";
}

exit();
?>
