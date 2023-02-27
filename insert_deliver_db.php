<?php
include('condb.php');
$deliver_number = $_POST['deliver_number'];
$deliver_id = $_POST['deliver_id'];
$deliver_day = $_POST['deliver_day'];
$ref_customer_order_number = $_POST['ref_customer_order_number'];
$deliver_address = $_POST['deliver_address'];
$ref_employee_number = $_POST['ref_employee_number'];

$result = 0;

if ($result > 0) {
    echo "<script type='text/javascript'>";
    echo "alert('ข้อมูลมีอยู่แล้ว กรุณาลองอีกครั้ง!');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "INSERT INTO tb_deliver(deliver_number, deliver_id, deliver_day, ref_customer_order_number, 	deliver_address, ref_employee_number) 
    VALUES ('$deliver_number', '$deliver_id', '$deliver_day', '$ref_customer_order_number', '$deliver_address', '$ref_employee_number')";
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
