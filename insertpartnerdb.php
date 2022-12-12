<?php
$con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$idptn = $_POST['idptn'];
$prefixptn = $_POST['prefixptn'];
$fnameptn = $_POST['fnameptn'];
$lnameptn = $_POST['lnameptn'];
$phoneptn = $_POST['phoneptn'];
$cnameptn = $_POST['cnameptn'];
$checkf = mysqli_query($con, "SELECT * FROM ptn WHERE fnameptn = '" . $fnameptn . "'");
$checkl = mysqli_query($con, "SELECT * FROM ptn WHERE lnameptn = '" . $lnameptn . "'");
$checkp = mysqli_query($con, "SELECT * FROM ptn WHERE phoneptn = '" . $phoneptn . "'");
$checkc = mysqli_query($con, "SELECT * FROM ptn WHERE cnameptn = '" .$cnameptn . "'");
$result1 = mysqli_num_rows($checkf);
$result2 = mysqli_num_rows($checkl);
$result3 = mysqli_num_rows($checkp);
$result4 = mysqli_num_rows($checkc);
if ($result1 > 0 || $result2 > 0 || $result3 > 0 || $result4 > 0) {
    echo "<script type='text/javascript'>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "INSERT INTO ptn
  (
    idptn,
    prefixptn,
    fnameptn,
    lnameptn,
    phoneptn,
    cnameptn
  ) 
  VALUES
  (
    '$idptn',
    '$prefixptn',
    '$fnameptn',
    '$lnameptn',
    '$phoneptn',
    '$cnameptn'	
  )";
    $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='partner.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='partner.php';";
        echo "</script>";
    }
}
exit();
