<?php
require('condb.php');

$employee_number = $_POST['employee_number'];
$employee_id = $_POST['employee_id'];
$ref_nameprefix_number = $_POST['ref_nameprefix_number'];
$employee_fname = $_POST['employee_fname'];
$employee_lname = $_POST['employee_lname'];
$employee_phone = $_POST['employee_phone'];
$employee_address = $_POST['employee_address'];
$ref_employee_type_number = $_POST['ref_employee_type_number'];
$employee_license = $_POST['employee_license'];

$sql = "UPDATE tb_employee SET 
        employee_id = '$employee_id',
        ref_nameprefix_number = '$ref_nameprefix_number',
        employee_fname = '$employee_fname',
        employee_lname = '$employee_lname',
        employee_phone = '$employee_phone',
        employee_address = '$employee_address',
        ref_employee_type_number = '$ref_employee_type_number',
        employee_license = '$employee_license'
        WHERE employee_number = '$employee_number'";

$update = mysqli_query($con, $sql) or die("Error occurred.");

if ($update) {
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
    echo "window.location.href='employee.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
    echo "window.location.href='update_employee.php';";
    echo "</script>";
}

exit();
