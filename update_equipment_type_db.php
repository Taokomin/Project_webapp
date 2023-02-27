<?php
require('condb.php');

$equipment_type_number = $_POST["equipment_type_number"];
$equipment_type_id = $_POST["equipment_type_id"];
$equipment_type_name = $_POST["equipment_type_name"];

$sql = "UPDATE tb_equipment_type SET equipment_type_id = '$equipment_type_id', material_equipment_name = '$equipment_type_name' WHERE equipment_type_number = '$equipment_type_number'";


$update = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if ($update) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
    echo "window.location.href='equipment_type.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
    echo "window.location.href='update_equipment_type.php';";
    echo "</script>";
}

exit();
?>
