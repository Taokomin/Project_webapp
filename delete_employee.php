<?php
include('condb.php');

if (isset($_GET['employee_number'])) {
    $employee_number = $_GET['employee_number'];
    $query = "DELETE FROM tb_employee WHERE employee_number='" . $employee_number . "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: employee.php");
        exit();
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
}
