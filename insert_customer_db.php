<?php
include('condb.php');
$customer_number = $_POST['customer_number'];
$customer_id = $_POST['customer_id'];
$ref_nameprefix_number = $_POST['ref_nameprefix_number'];
$customer_fname = $_POST['customer_fname'];
$customer_lname = $_POST['customer_lname'];
$customer_phone = $_POST['customer_phone'];
$customer_email = $_POST['customer_email'];

$check = mysqli_query($con, "SELECT * FROM tb_customer WHERE customer_fname = '$customer_fname' OR customer_lname = '$customer_lname' OR customer_phone = '$customer_phone' OR customer_email = '$customer_email'");
$result = mysqli_num_rows($check);

if ($result > 0) {
    echo "<script type='text/javascript'>";
    echo "alert('ข้อมูลมีอยู่แล้ว กรุณาลองอีกครั้ง!');";
    echo "window.history.back();";
    echo "</script>";
} else {
    $sql = "INSERT INTO tb_customer (customer_number, customer_id, ref_nameprefix_number, customer_fname, customer_lname, customer_phone, customer_email) 
    VALUES ('$customer_number', '$customer_id', '$ref_nameprefix_number', '$customer_fname', '$customer_lname', '$customer_phone', '$customer_email')";
    $insert = mysqli_query($con, $sql) or die("Error occurred.");
    if ($insert) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว.');";
        echo "window.location.href='customer.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('บางอย่างผิดพลาด, กรุณาลองอีกครั้ง!');";
        echo "window.location.href='insert_customer.php';";
        echo "</script>";
    }
}
exit();
?>
