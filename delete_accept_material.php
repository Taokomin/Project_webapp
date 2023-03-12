<?php
include('condb.php');

if (isset($_GET['accept_material_number'])) {
    $accept_material_number = $_GET['accept_material_number'];
    $query = "DELETE FROM tb_accept_material WHERE accept_material_number='" . $accept_material_number . "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: accept_material.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
