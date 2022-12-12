<?php
$con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$idemp = $_POST['idemp'];
$prefixemp = $_POST['prefixemp'];
$fnameemp = $_POST['fnameemp'];
$lnameemp = $_POST['lnameemp'];
$phoneemp = $_POST['phoneemp'];
$addressemp = $_POST['addressemp'];
$tyemp = $_POST['tyemp'];
$stemp = $_POST['stemp'];
$checkf = mysqli_query($con, "SELECT * FROM emp WHERE fnameemp = '" . $fnameemp . "'");
$checkl = mysqli_query($con, "SELECT * FROM emp WHERE lnameemp = '" . $lnameemp . "'");
$checkp = mysqli_query($con, "SELECT * FROM emp WHERE phoneemp = '" . $phoneemp . "'");
$result1 = mysqli_num_rows($checkf) or die("เกิดข้อผิดพลาดเกิดขึ้น");
$result2 = mysqli_num_rows($checkl) or die("เกิดข้อผิดพลาดเกิดขึ้น");
$result3 = mysqli_num_rows($checkp) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if ($result1 > 0 || $result2 > 0 || $result3 > 0 ) {
  echo "<script type='text/javascript'>";
  echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
  echo "window.history.back();";
  echo "</script>";
} else {
  $sql = "INSERT INTO tmqdb
  (
    idemp,
    prefixemp,
    fnameemp,
    lnameemp,
    phoneemp,
    addressemp,
    tyemp,
    stemp
  ) 
  VALUES
  (
    '$idemp',
    '$prefixemp',
    '$fnameemp',
    '$lnameemp',
    '$phoneemp',
    '$addressemp',
    '$tyemp',
    '$stemp'	
  )";
  $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
  if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
    echo "window.location.href='employee.php';";
    echo "</script>";
  } else {
    echo "<script type='text/javascript'>";
    echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
    echo "window.location.href='employee.php';";
    echo "</script>";
  }
}
exit();
