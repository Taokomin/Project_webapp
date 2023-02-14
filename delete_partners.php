<?php
include('condb.php');

if (isset($_GET['partners_number'])) {
    $partners_number = $_GET['employee_number'];
    $query = "DELETE FROM tb_partners WHERE partners_number='" . $partners_number . "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: partners.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
