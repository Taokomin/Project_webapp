<?php
include('condb.php');
$pickup_material_number = isset($_POST['pickup_material_number']) ? $_POST['pickup_material_number'] : '';
$pickup_material_id = $_POST['pickup_material_id'];
$pickup_material_day = $_POST['pickup_material_day'];
$ref_equipment_id = $_POST['ref_equipment_id'];
$ref_equipment_name = $_POST['ref_equipment_name'];
$ref_equipment_quantity = $_POST['ref_equipment_quantity'];
$ref_unit_name = $_POST['ref_unit_name'];
$ref_equipment_type_number = $_POST['ref_equipment_type_number'];
$ref_employee_number = $_POST['ref_employee_number'];
$ref_pickup_material_status = $_POST['ref_pickup_material_status'];

$sql_insert = "INSERT INTO tb_pickup_material (pickup_material_number, pickup_material_id, pickup_material_day, ref_equipment_id, ref_equipment_name, ref_equipment_quantity, ref_unit_name, ref_equipment_type_number, ref_employee_number, ref_pickup_material_status) 
VALUES ('$pickup_material_number', '$pickup_material_id', '$pickup_material_day', '$ref_equipment_id', '$ref_equipment_name', '$ref_equipment_quantity', '$ref_unit_name', '$ref_equipment_type_number', '$ref_employee_number', '$ref_pickup_material_status')";

if ($con->query($sql_insert) === TRUE) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว.');";
    echo "window.location.href='pickup_material.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
    echo "window.location.href='insert_pickup_material.php';";
    echo "</script>";
}

mysqli_close($con);
?>
