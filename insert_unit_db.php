<?php
include('condb.php');
$unit_number = $_POST['unit_number'];
$unit_id = $_POST['unit_id'];
$unit_name = $_POST['unit_name'];
$check = "SELECT unit_name FROM tb_unit  WHERE unit_name = '$unit_name' ";
$result = mysqli_query($con, $check) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if (mysqli_num_rows($result) > 0) {
  echo "<script type='text/javascript'>";
  echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
  echo "window.history.back();";
  echo "</script>";
} else {
  $sql = "INSERT INTO tb_unit
  (
    unit_number,
    unit_id,
    unit_name
  ) 
  VALUES
  (
  '$unit_number',
  '$unit_id',
  '$unit_name'
  )";
    $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='unit.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='insert_unit.php';";
        echo "</script>";
    }
  }
exit();
?>

