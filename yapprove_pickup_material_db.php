<?php
    include('condb.php');
    $pickup_material_number = $_POST['pickup_material_number'];
    $ref_pickup_material_status = $_POST['ref_pickup_material_status'];

    $sql = "UPDATE tb_pickup_material SET 
            ref_pickup_material_status = '$ref_pickup_material_status'
            WHERE pickup_material_number = '$pickup_material_number'";
    $update = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาด");
    if ($update) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขสถานะการอนุมัติเรียบร้อยแล้ว');";
        echo "window.location.href='approve_pickup_material.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='yapprove_pickup_material.php';";
        echo "</script>";
    }
    exit();
?>