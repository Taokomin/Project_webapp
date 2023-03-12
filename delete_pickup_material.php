<?php
include('condb.php');

if (isset($_GET['pickup_material_number'])) {
    $pickup_material_number = $_GET['pickup_material_number'];
    $query = "DELETE FROM tb_pickup_material WHERE pickup_material_number='" . $pickup_material_number . "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: pickup_material.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
