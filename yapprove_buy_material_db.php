<?php
include('condb.php');
$buy_material_number = $_POST['buy_material_number'];
$buy_material_status = $_POST['buy_material_status'];

$sql = "UPDATE tb_buy_material SET 
            buy_material_status = '$buy_material_status'
            WHERE buy_material_number = '$buy_material_number'";
    $update = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาด");
    if ($update) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขสถานะการอนุมัติเรียบร้อยแล้ว');";
        echo "window.location.href='approve_buy_material.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='yapprove_buy_material.php';";
        echo "</script>";
    }
    exit();
?>
