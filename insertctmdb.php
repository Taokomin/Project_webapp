<?php
$con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$idctm = $_POST['idctm'];
$prefixctm = $_POST['prefixctm'];
$fnamectm = $_POST['fnamectm'];
$lnamectm = $_POST['lnamectm'];
$phonectm = $_POST['phonectm'];
$emailctm = $_POST['emailctm'];
$checkf = mysqli_query($con, "SELECT * FROM ctm WHERE fnamectm = '" . $fnamectm . "'");
$checkl = mysqli_query($con, "SELECT * FROM ctm WHERE lnamectm = '" . $lnamectm . "'");
$checkp = mysqli_query($con, "SELECT * FROM ctm WHERE phonectm = '" . $phonectm . "'");
$checke = mysqli_query($con, "SELECT * FROM ctm WHERE emailctm = '" . $emailctm. "'");
$result1 = mysqli_num_rows($checkf) ;
$result2 = mysqli_num_rows($checkl) ;
$result3 = mysqli_num_rows($checkp) ;
$result4 = mysqli_num_rows($checke) ;
if ($result1 > 0 || $result2 > 0 || $result3 > 0 || $result4 > 0) {
    echo "<script type='text/javascript'>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "INSERT INTO ctm
  (
    idctm,prefixctm,fnamectm,lnamectm,phonectm,emailctm
  ) 
  VALUES
  (
    '$idctm', 
    '$prefixctm',
    '$fnamectm',
    '$lnamectm',
    '$phonectm',
    '$emailctm'
    
  )";
    $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='customer.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='customer.php';";
        echo "</script>";
    }
}
exit();
