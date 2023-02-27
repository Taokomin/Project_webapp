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

$result = 0;

if ($result > 0) {
    echo "<script type='text/javascript'>";
    echo "alert('ข้อมูลมีอยู่แล้ว กรุณาลองอีกครั้ง!');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "INSERT INTO tb_customer_order (customer_order_number, customer_order_id, customer_order_day, customer_order_detail, customer_order_quantity, ref_unit_number, ref_customer_number,ref_employee_number) 
    VALUES ('$customer_order_number', '$customer_order_id', '$customer_order_day', '$customer_order_detail', '$customer_order_quantity', '$ref_unit_number', '$ref_customer_number','$ref_employee_number')";
    $insert = mysqli_query($con, $sql) or die("Error occurred.");
    if ($insert) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว.');";
        echo "window.location.href='customer_order.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='insert_customer_order.php';";
        echo "</script>";
    }
}
exit();
?>
