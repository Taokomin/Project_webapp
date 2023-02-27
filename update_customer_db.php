<?php
require('condb.php');
$customer_number = $_POST['customer_number'];
$customer_id = $_POST['customer_id'];
$ref_nameprefix_number = $_POST['ref_nameprefix_number'];
$customer_fname = $_POST['customer_fname'];
$customer_lname = $_POST['customer_lname'];
$customer_phone = $_POST['customer_phone'];
$customer_email = $_POST['customer_email'];


if ($result > 0) {
    echo "<script type='text/javascript'>";
    echo "alert('ข้อมูลมีอยู่แล้ว กรุณาลองอีกครั้ง!');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "UPDATE tb_customer (customer_number, customer_id, ref_nameprefix_number, customer_fname, customer_lname, customer_phone, customer_email) 
    VALUES ('$customer_number', '$customer_id', '$ref_nameprefix_number', '$customer_fname', '$customer_lname', '$customer_phone', '$customer_email')";
    $insert = mysqli_query($con, $sql) or die("Error occurred.");
    if ($insert) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
        echo "window.location.href='customer.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='update_customer.php';";
        echo "</script>";
    }
}
exit();
