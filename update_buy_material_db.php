<?php
include('condb.php');
$buy_material_number = $_POST['buy_material_number'];
$buy_material_id = $_POST['buy_material_id'];
$buy_material_day = $_POST['buy_material_day'];
$buy_material_detail = $_POST['buy_material_detail'];
$ref_equipment_number = $_POST['ref_equipment_number	'];
$buy_material_quantity = $_POST['buy_material_quantity'];
$ref_unit_number = $_POST['ref_unit_number'];
$ref_equipment_type = $_POST['ref_equipment_type'];
$ref_employee_number = $_POST['ref_employee_number	'];
$ref_partners_number = $_POST['ref_partners_number'];
$buy_material_status = $_POST['buy_material_status'];

$sql = "UPDATE tb_buy_material SET 
            buy_material_id = '$buy_material_id',
            buy_material_day = '$buy_material_day',
            buy_material_detail = '$buy_material_detail',
            ref_equipment_number = '$ref_equipment_number',
            buy_material_quantity = '$buy_material_quantity',
            ref_equipment_type = '$ref_equipment_type',
            ref_employee_number = '$ref_employee_number'
            ref_partners_number = '$ref_partners_number'
            buy_material_status = '$buy_material_status'
            WHERE buy_material_number = '$buy_material_number'";
    $update = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาด");
    if ($update) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='buy_material.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='update_buy_material.php';";
        echo "</script>";
    }
    exit();
?>
