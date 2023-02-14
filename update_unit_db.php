<?php
require('condb.php');

$unit_number = $_POST["unit_number"];
$unit_id = $_POST["unit_id"];
$unit_name = $_POST["unit_name"];

$sql = "UPDATE tb_unit SET uni_id = '$unit_id', unit_name = 'unit_name' WHERE unit_number = '$unit_number'";


$result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
    echo "window.location.href='unit.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
    echo "window.location.href='update_unit.php';";
    echo "</script>";
}

exit();
?>