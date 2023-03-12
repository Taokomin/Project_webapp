<?php
include('condb.php');
$deliver_number = $_GET['deliver_number'];
$deliver_id = $_GET['deliver_id'];
$deliver_day = $_GET['deliver_day'];
$ref_customer_order_id = $_GET['ref_customer_order_id'];
$ref_customer_order_day = $_GET['ref_customer_order_day'];
$ref_customer_order_detail = $_GET['ref_customer_order_detail'];
$ref_customer_order_quantity = $_GET['ref_customer_order_quantity'];
$ref_unit_name = $_GET['ref_unit_name'];
$ref_customer_fname = $_GET['ref_customer_fname'];
$deliver_address = $_GET['deliver_address'];
$ref_employee_number = $_GET['ref_employee_number'];


$result = 0;

if ($result > 0) {
    echo "<script type='text/javascript'>";
    echo "alert('ข้อมูลมีอยู่แล้ว กรุณาลองอีกครั้ง!');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "INSERT INTO tb_deliver(`deliver_number`, `deliver_id`, `deliver_day`, `ref_customer_order_id`, `ref_customer_order_day`, `ref_customer_order_detail`, `ref_customer_order_quantity`, `ref_unit_name`, `ref_customer_fname`, `deliver_address`, `ref_employee_number`) 
    VALUES ('$deliver_number', '$deliver_id', '$deliver_day', '$ref_customer_order_id', '$ref_customer_order_day', '$ref_customer_order_detail', '$ref_customer_order_quantity', '$ref_unit_name', '$ref_customer_fname', '$deliver_address', '$ref_employee_number')";
    $insert = mysqli_query($con, $sql) or die("Error occurred.");
    if ($insert) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว.');";
        echo "window.location.href='deliver.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='insert_deliver.php';";
        echo "</script>";
    }
}
exit();
?>
