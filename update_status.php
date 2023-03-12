<?php
include('condb.php');

$status = $_POST['status'];
$id = $_POST['id'];

$query = "UPDATE tb_buy_material SET buy_material_status = '$status' WHERE buy_material_number = $id";
$result = mysqli_query($con, $query);

if($result){
  echo "อัปเดตสถานะสำเร็จแล้ว!";
} else{
  echo "เกิดข้อผิดพลาดในการอัปเดตสถานะ:" . mysqli_error($con);
}

mysqli_close($con);
?>
