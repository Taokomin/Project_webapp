<?php
include('condb.php');
$accept_material_number  = $_POST['accept_material_number'];
$accept_material_id = $_POST['accept_material_id'];
$accept_material_day = $_POST['accept_material_day'];
$ref_buy_material_id = $_POST['accept_material_day'];
$ref_buy_material_day = $_POST['accept_material_day'];
$ref_buy_material_detail = $_POST['ref_buy_material_detail'];
$ref_equipment_number = $_POST['ref_equipment_number'];
$ref_buy_material_quantity = $_POST['ref_buy_material_quantity'];
$ref_unit_number = $_POST['ref_unit_number'];
$ref_equipment_type = $_POST['ref_equipment_type'];
$ref_employee_number = $_POST['ref_employee_number'];
$ref_partners_number = $_POST['ref_partners_number'];

$result = 0;

if ($result > 0) {
    echo "<script type='text/javascript'>";
    echo "alert('ข้อมูลมีอยู่แล้ว กรุณาลองอีกครั้ง!');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "INSERT INTO tb_accept_material (accept_material_number, accept_material_id, accept_material_day, ref_buy_material_id, ref_buy_material_day, ref_buy_material_detail, ref_equipment_number, ref_buy_material_quantity, ref_unit_number, ref_equipment_type, ref_employee_number, ref_partners_number) 
    VALUES ('$accept_material_number', '$accept_material_id', '$accept_material_day', '$ref_buy_material_id', '$ref_buy_material_day', '$ref_buy_material_detail', '$ref_equipment_number','$ref_buy_material_quantity','$ref_unit_number','$ref_equipment_type','$ref_employee_number','$ref_partners_number')";
    $insert = mysqli_query($con, $sql) or die("Error occurred.");
    if ($insert) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว.');";
        echo "window.location.href='accept_material.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='insert_accept_material_db.php';";
        echo "</script>";
    }
}
exit();
