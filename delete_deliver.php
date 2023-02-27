<?php
include('condb.php');

if (isset($_GET['deliver_number'])) {
    $deliver_number = $_GET['deliver_number'];
    $query = "DELETE FROM tb_deliver WHERE deliver_number='" . $deliver_number . "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: deliver.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
