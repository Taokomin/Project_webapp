<?php
  include("condb.php");
  $unit_number = mysqli_real_escape_string($con, $_GET['unit_number']);
  
  $check_query = "SELECT unit_number FROM tb_unit WHERE unit_number = '$unit_number'";
  $check_result = mysqli_query($con, $check_query);
  
  if (mysqli_num_rows($check_result) > 0) {
      $check_query = "SELECT ref_unit_number FROM tb_equipment WHERE ref_unit_number = '$unit_number'";
      $check_result = mysqli_query($con, $check_query);
      
      if (mysqli_num_rows($check_result) > 0) {
          echo "<script>alert('ไม่สามารถลบข้อมูลนี้ได้เนื่องจากเกี่ยวข้องกับตารางอื่น'); history.back();</script>";
      } else {
          $delete_query = "DELETE FROM tb_unit WHERE unit_number = '$unit_number'";
          $delete_result = mysqli_query($con, $delete_query);
          
          if ($delete_result) {
              echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว'); window.location = 'unit.php';</script>";
          } else {
              echo "Error: " . $delete_query . " " . mysqli_error($con);
          }
      }
  } else {
      echo "<script>alert('ข้อมูลนี้ไม่มีในระบบ'); history.back();</script>";
  }

  mysqli_close($con);
?>