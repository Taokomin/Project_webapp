<?php

include_once('functions.php');
$updatedata = new DB_con();
if (isset($_POST['updatetmq'])) {
  $idtmq = $_GET['idtmq'];
  $tmq = $_POST['tmq'];
  $sql = $updatedata->updatetmq($idtmq, $tmq);
  if ($sql) {
    echo "<script>alert('แก้ไข้ข้อมูลเรียบร้อยแล้ว!');</script>";
    echo "<script>window.location.href='typemandq.php'</script>";
  } else {
    echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
    echo "<script>window.location.href='typemandq.php'</script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แก้ไขข้อมูลข้อมูลประเภทวัสดุและอุปกรณ์ </title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <h1 class="mt-5">แก้ไขข้อมูลข้อมูลประเภทวัสดุและอุปกรณ์ </h1>
    <hr>
    <?php
    $idtmq = $_GET['idtmq'];
    $updateuser = new DB_con();
    $sql = $updateuser->fetchonerecordtmq($idtmq);
    while ($row = mysqli_fetch_array($sql)) {
    ?>
      <form action="" method="post">
        <div class="mb-3">
          <label for="idtmq" class="form-label">รหัสประเภทวัสดุและอุปกรณ์</label>
          <input type="text" class="form-control" name="idtmq" value="<?php echo $row['idtmq']; ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="tmq" class="form-label">ประเภทวัสดุและอุปกรณ์</label>
          <input type="text" class="form-control" name="tmq" value="<?php echo $row['tmq']; ?>" required>
        </div>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" name="updatetmq" class="btn btn-success">แก้ไขข้อมูล</button>&nbsp;&nbsp;
        <a type="button" class="btn btn-danger" href="typemandq.php">&nbsp;&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;&nbsp;</a>
      </form>
    <?php } ?>




    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>

</html>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: linear-gradient(135deg, #03018C, #212AA5, #4259C3);
  }

  .container {
    max-width: 700px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  }

  .container .title {
    font-size: 25px;
    font-weight: 500;
    position: relative;
  }

  .container .title::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: linear-gradient(135deg, #03018C, #212AA5, #4259C3);
  }
</style>