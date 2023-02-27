<?php
    include('condb.php');
    

    $customer_order_number = $_POST['customer_order_number'];
    $customer_order_id = $_POST['customer_order_id'];
    $customer_order_day = $_POST['customer_order_day'];
    $customer_order_detail = $_POST['customer_order_detail'];
    $customer_order_quantity = $_POST['customer_order_quantity'];
    $ref_unit_number = $_POST['ref_unit_number'];
    $ref_customer_number = $_POST['ref_customer_number'];
    $ref_employee_number = $_POST['ref_employee_number'];


    $sql = "UPDATE tb_customer_order SET 
            customer_order_id = '$customer_order_id',
            customer_order_day = '$customer_order_day',
            customer_order_detail = '$customer_order_detail',
            customer_order_quantity = '$customer_order_quantity',
            ref_unit_number = '$ref_unit_number',
            ref_customer_number = '$ref_customer_number',
            ref_employee_number = '$ref_employee_number'
            WHERE customer_order_number = '$customer_order_number'";
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
