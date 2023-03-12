<?php
include('condb.php');
$accept_material_number = $_POST['accept_material_number'];
$accept_material_id = $_POST['accept_material_id'];
$accept_material_day = $_POST['accept_material_day'];
$ref_buy_material_number = $_POST['ref_buy_material_number'];
$ref_equipment_number = $_POST['ref_equipment_number'];
$accept_material_quantity = $_POST['accept_material_quantity'];
$ref_unit_number = $_POST['ref_unit_number'];
$ref_equipment_type_number = $_POST['ref_equipment_type_number'];
$ref_employee_number = $_POST['ref_employee_number	'];

$sql = "UPDATE tb_accept_material SET 
            accept_material_id = '$accept_material_id',
            accept_material_day = '$accept_material_day',
            ref_buy_material_number = '$ref_buy_material_number',
            ref_equipment_number = '$ref_equipment_number',
            accept_material_quantity = '$accept_material_quantity',
            ref_unit_number = '$ref_unit_number'
            ref_equipment_type_number = '$ref_equipment_type_number'
            ref_employee_number = '$ref_employee_number'
            WHERE accept_material_number = '$accept_material_number'";
    $update = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาด");
    if ($update) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='accept_material.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='update_accept_material.php';";
        echo "</script>";
    }
    exit();
?>
