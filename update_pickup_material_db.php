<?php
    include('condb.php');
    $pickup_material_number = $_POST['pickup_material_number'];
    $pickup_material_id = $_POST['pickup_material_id'];
    $pickup_material_day = $_POST['pickup_material_day'];
    $ref_equipment_id = $_POST['ref_equipment_id'];
    $ref_equipment_name = $_POST['ref_equipment_name'];
    $ref_equipment_quantity = $_POST['ref_equipment_quantity'];
    $ref_unit_name = $_POST['ref_unit_name'];
    $ref_equipment_type_number = $_POST['ref_equipment_type_number'];
    $ref_employee_number = $_POST['ref_employee_number'];
    $ref_pickup_material_status = $_POST['ref_pickup_material_status'];

    $sql = "UPDATE tb_pickup_material SET 
            pickup_material_id = '$pickup_material_id',
            pickup_material_day = '$pickup_material_day',
            ref_equipment_id = '$ref_equipment_id', 
            ref_equipment_name = '$ref_equipment_name',
            ref_equipment_quantity  = '$ref_equipment_quantity '
            ref_unit_name = '$ref_unit_name'
            ref_equipment_type_number = '$ref_equipment_type_number'
            ref_employee_number = '$ref_employee_number'
            ref_pickup_material_status = '$ref_pickup_material_status'
            WHERE pickup_material_number = '$pickup_material_number'";
    $update = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาด");
    if ($update) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='pickup_material.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='update_pickup_material.php';";
        echo "</script>";
    }
    exit();
?>