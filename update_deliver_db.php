<?php
    include('condb.php');
    

    $deliver_number = $_POST['deliver_number'];
    $deliver_id = $_POST['deliver_id'];
    $deliver_day = $_POST['deliver_day'];
    $ref_customer_order_number = $_POST['ref_customer_order_number'];
    $deliver_address = $_POST['deliver_address'];
    $ref_employee_number = $_POST['ref_employee_number'];


    $sql = "UPDATE tb_deliver SET 
            deliver_id = '$deliver_id',
            deliver_day = '$deliver_day',
            ref_customer_order_number = '$ref_customer_order_number', 
            deliver_address = '$deliver_address',
            ref_employee_number = '$ref_employee_number'
            WHERE deliver_number = '$deliver_number'";
    $update = mysqli_query($con, $sql) or die("เกิดข้อผิดพลาด");
    if ($update) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='customer_order.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='update_customer_order.php';";
        echo "</script>";
    }
    exit();
?>
