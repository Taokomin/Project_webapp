<?php
include('condb.php');

if (isset($_GET['buy_material_number'])) {
    $buy_material_number = $_GET['pickup_material_number'];
    $query = "DELETE FROM tb_buy_material WHERE buy_material_number='" . $buy_material_number . "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: approve_buy_material.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
