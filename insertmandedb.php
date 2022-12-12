<?php
$con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$idmande = $_POST['idmande'];
$mande = $_POST['mande'];
$mandeqty = $_POST['mandeqty'];
$mandeunit = $_POST['mandeunit'];
$tmqmande = $_POST['tmqmande'];
$checkm = mysqli_query($con, "SELECT * FROM mandedb WHERE mande = '" . $mande . "'");
$result1 = mysqli_num_rows($checkm) or die("เกิดข้อผิดพลาดเกิดขึ้น");
if ($result1 > 0 ) {
    echo "<script type='text/javascript'>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "INSERT INTO mandedb
  (
    idmande,
    mande,
    mandeqty,
    mandeunit,
    tmqmande
  ) 
  VALUES
  (
    '$idmande',
    '$mande',
    '$mandeqty',
    '$mandeunit',
    '$tmqmande'
  )";
    $result = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาดเกิดขึ้น");
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='mande.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');";
        echo "window.location.href='mande.php';";
        echo "</script>";
    }
}
exit();
