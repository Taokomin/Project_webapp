<?php
include('condb.php');
$equipment_number = $_POST['equipment_number'];
$equipment_id = $_POST['equipment_id'];
$equipment_name = $_POST['equipment_name'];
$equipment_quantity = $_POST['equipment_quantity'];
$ref_unit_number = $_POST['ref_unit_number'];
$ref_equipment_type_number = $_POST['ref_equipment_type_number'];
$check = "SELECT equipment_name FROM tb_equipment WHERE equipment_name = '$equipment_name' ";
$result = mysqli_query($con, $check) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if (mysqli_num_rows($result) > 0) {
  echo "<script type='text/javascript'>";
  echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
  echo "window.history.back();";
  echo "</script>";
} else {
  $sql = "INSERT INTO tb_equipment
  (
    equipment_number,
    equipment_id,
    equipment_name
    equipment_quantity,
    ref_unit_number,
    ref_equipment_type_number
  ) 
  VALUES
  (
  '$equipment_number',
  '$equipment_id',
  '$equipment_name',
  '$equipment_quantity',
  '$ref_unit_number',
  '$ref_equipment_type_number'
  )";
    $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='equipment.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='insert_equipment.php';";
        echo "</script>";
    }
  }
exit();
