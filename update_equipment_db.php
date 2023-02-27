<?php
include('condb.php');
$equipment_number = $_POST['equipment_number'];
$equipment_id = $_POST['equipment_id'];
$equipment_name = $_POST['equipment_name'];
$equipment_quantity = $_POST['equipment_quantity'];
$ref_unit_number = $_POST['ref_unit_number'];
$ref_equipment_type_number = $_POST['ref_equipment_type_number'];

    $sql = "UPDATE tb_equipment(equipment_number,equipment_id,equipment_nameequipment_quantity,ref_unit_number,ref_equipment_type_number) 
    VALUES('$equipment_number','$equipment_id','$equipment_name','$equipment_quantity','$ref_unit_number','$ref_equipment_type_number')";
    $update = mysqli_query($con, $sql) or die("Error occurred.");
    if ($update) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='equipment.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='update_equipment.php';";
        echo "</script>";
    }
exit();
?>