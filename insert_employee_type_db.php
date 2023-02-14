<?php
include('condb.php');
$employee_type_number = $_POST['employee_type_number'];
$employee_type_id = $_POST['employee_type_id'];
$employee_type_name = $_POST['employee_type_name'];
$check = "SELECT employee_type_name FROM tb_employee_type  WHERE employee_type_name = '$employee_type_name' ";
$result = mysqli_query($con, $check) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if (mysqli_num_rows($result) > 0) {
  echo "<script type='text/javascript'>";
  echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
  echo "window.history.back();";
  echo "</script>";
} else {
  $sql = "INSERT INTO tb_employee_type
  (
  employee_type_number,
  employee_type_id,
  employee_type_name
  ) 
  VALUES
  (
  '$employee_type_number',
  '$employee_type_id',
  '$employee_type_name'
  )";
    $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='employee_type.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='insert_employee_type.php';";
        echo "</script>";
    }
  }
exit();
?>

