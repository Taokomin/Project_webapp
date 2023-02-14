<?php
include('condb.php');
$equipment_type_number = $_POST['equipment_type_number'];
$equipment_type_id = $_POST['equipment_type_id'];
$equipment_type_name = $_POST['equipment_type_name'];
$check = "SELECT equipment_type_name FROM tb_equipment_type  WHERE equipment_type_name = '$equipment_type_name' ";
$result = mysqli_query($con, $check) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if (mysqli_num_rows($result) > 0) {
  echo "<script type='text/javascript'>";
  echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
  echo "window.history.back();";
  echo "</script>";
} else {
  $sql = "INSERT INTO tb_employee_type
  (
    equipment_type_number,
    equipment_type_id,
    equipment_type_name
  ) 
  VALUES
  (
  '$equipment_type_number',
  '$equipment_type_id',
  '$equipment_type_name'
  )";
    $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='equipment_type.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='insert_equipment_type.php';";
        echo "</script>";
    }
  }
exit();
?>