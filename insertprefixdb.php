<?php
$con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$idpfix = $_POST['idpfix'];
$nameprefix = $_POST['nameprefix'];
$check = "SELECT nameprefix FROM neprefix  WHERE nameprefix = '$nameprefix' ";
$result = mysqli_query($con, $check) or die("เกิดข้อผิดพลาดเกิดขึ้น");
  if(mysqli_num_rows($result) > 0){
    echo "<script type='text/javascript'>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "INSERT INTO neprefix
  (
  idpfix,
  nameprefix
  ) 
  VALUES
  (
  '$idpfix',
  '$nameprefix'
  )";
    $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='prefix.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='prefix.php';";
        echo "</script>";
    }
  }
exit();
?>