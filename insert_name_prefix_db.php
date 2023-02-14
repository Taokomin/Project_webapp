<?php
include('condb.php');
$prefix_number = $_POST['prefix_number'];
$prefix_id = $_POST['prefix_id'];
$prefix_name = $_POST['prefix_name'];
$check = "SELECT prefix_name FROM tb_nameprefix  WHERE prefix_name = '$prefix_name' ";
$result = mysqli_query($con, $check) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if (mysqli_num_rows($result) > 0) {
  echo "<script type='text/javascript'>";
  echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
  echo "window.history.back();";
  echo "</script>";
} else {
  $sql = "INSERT INTO tb_nameprefix
  (
  prefix_number,
  prefix_id,
  prefix_name
  ) 
  VALUES
  (
  '$prefix_number',
  '$prefix_id',
  '$prefix_name'
  )";
    $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='name_prefix.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='insert_name_prefix.php';";
        echo "</script>";
    }
  }
exit();
?>

