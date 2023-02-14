<?php
include('condb.php');

if (isset($_GET['equipment_number'])) {
    $equipment_number = $_GET['equipment_number'];
    $query = "DELETE FROM tb_equipment WHERE equipment_number='" . $equipment_number . "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: equipment.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
