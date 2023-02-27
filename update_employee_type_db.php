<?php
require('condb.php');

$employee_type_number = $_POST["employee_type_number"];
$employee_type_id = $_POST["employee_type_id"];
$employee_type_name = $_POST["employee_type_name"];

$sql = "UPDATE tb_employee_type SET prefix_id = '$employee_type_id', prefix_name = '$employee_type_name' WHERE employee_type_number = '$employee_type_number'";


$update = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if ($update) {
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
    echo "window.location.href='employee_type.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
    echo "window.location.href='update_employee_type.php';";
    echo "</script>";
}

exit();
?>
