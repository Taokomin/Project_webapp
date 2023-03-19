<?php
include('condb.php');

if (isset($_GET['takeback_number'])) {
    $takeback_number = $_GET['takeback_number'];
    $query = "DELETE FROM tb_takeback WHERE takeback_number='" . $takeback_number . "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: takeback.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
