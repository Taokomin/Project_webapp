<?php
    include('condb.php');
    $takeback_number = $_POST['takeback_number'];
    $takeback_id = $_POST['takeback_id'];
    $takeback_day = $_POST['takeback_day'];
    $ref_equipment_id = $_POST['ref_equipment_id'];
    $ref_equipment_name = $_POST['ref_equipment_name'];
    $ref_equipment_quantity = $_POST['ref_equipment_quantity'];
    $ref_unit_name = $_POST['ref_unit_name'];
    $ref_equipment_type_number = $_POST['ref_equipment_type_number'];
    $ref_employee_number = $_POST['ref_employee_number'];
    $ref_pickup_material_status = $_POST['ref_pickup_material_status'];

    $sql = "UPDATE tb_takeback SET 
            takeback_id = '$takeback_id',
            takeback_day = '$takeback_day',
            ref_equipment_id = '$ref_equipment_id', 
            ref_equipment_name = '$ref_equipment_name',
            ref_equipment_quantity  = '$ref_equipment_quantity '
            ref_unit_name = '$ref_unit_name'
            ref_equipment_type_number = '$ref_equipment_type_number'
            ref_employee_number = '$ref_employee_number'
            ref_pickup_material_status = '$ref_pickup_material_status'
            WHERE takeback_number = '$takeback_number'";
    $update = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาด");
    if ($update) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='takeback.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='update_takeback.php';";
        echo "</script>";
    }
    exit();
?>