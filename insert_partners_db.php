<?php
include('condb.php');
$partners_number = $_POST['partners_number'];
$partners_id = $_POST['partners_id'];
$partners_fname = $_POST['partners_fname'];
$partners_lname = $_POST['partners_lname'];
$partners_phone = $_POST['partners_phone'];
$partners_company = $_POST['partners_company'];
$check = "SELECT prefix_name FROM tb_nameprefix  WHERE partners_fname = '$partners_fname' OR partners_lname = '$partners_lname' ";
$result = mysqli_query($con, $check) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if (mysqli_num_rows($result) > 0) {
  echo "<script type='text/javascript'>";
  echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
  echo "window.history.back();";
  echo "</script>";
} else {
  $sql = "INSERT INTO tb_nameprefix
  (
    partners_number,
    partners_id,
    partners_fname,
    partners_lname,
    partners_phone,
    partners_company
  ) 
  VALUES
  (
  '$partners_number',
  '$partners_id',
  '$partners_fname',
  '$partners_lname',
  '$partners_phone',
  '$partners_company'
  )";
    $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='partners.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='insert_partners.php';";
        echo "</script>";
    }
  }
exit();
?>

