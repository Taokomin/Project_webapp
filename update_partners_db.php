<?php
include('condb.php');
$partners_number = $_POST['partners_number'];
$partners_id = $_POST['partners_id'];
$partners_fname = $_POST['partners_fname'];
$partners_lname = $_POST['partners_lname'];
$partners_phone = $_POST['partners_phone'];
$partners_company = $_POST['partners_company'];
$sql = "UPDATE tb_partners SET partners_id = '$partners_id', partners_fname = '$partners_fname' , partners_lname = '$partners_lname' ,partners_phone = '$partners_phone',partners_company = '$partners_company'WHERE partners_number = '$partners_number'";
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
  
exit();
?>

