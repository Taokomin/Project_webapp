<?php
include('condb.php');

if (isset($_GET['customer_order_number'])) {
    $customer_order_number = $_GET['customer_order_number'];
    $query = "DELETE FROM tb_customer_order WHERE customer_order_number='" . $customer_order_number. "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: customer_order.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
