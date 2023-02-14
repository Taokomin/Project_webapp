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

$check = mysqli_query($con, "SELECT * FROM tb_employee WHERE employee_fname = '$employee_fname' OR employee_lname = '$employee_lname' OR employee_phone = '$employee_phone' ");
$result = mysqli_num_rows($check);

if ($result > 0) {
    echo "<script type='text/javascript'>";
    echo "alert('ข้อมูลมีอยู่แล้ว กรุณาลองอีกครั้ง!');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "UPDATE tb_employee (employee_number, employee_id, ref_nameprefix_number, employee_fname, employee_lname, employee_phone, employee_address, ref_employee_type_number, employee_license) 
    VALUES ('$employee_number', '$employee_id', '$ref_nameprefix_number', '$employee_fname', '$employee_lname', '$employee_phone', '$employee_address', '$ref_employee_type_number', '$employee_license')";
    $insert = mysqli_query($con, $sql) or die("Error occurred.");
    if ($insert) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว.');";
        echo "window.location.href='employee.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='update_employee.php';";
        echo "</script>";
    }
}
exit();
