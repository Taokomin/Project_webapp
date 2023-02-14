<?php
include('condb.php');

if (isset($_GET['customer_number'])) {
    $customer_number = $_GET['customer_number'];
    $query = "DELETE FROM tb_customer WHERE customer_number='" . $customer_number . "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: customer.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
