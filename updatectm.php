<?php

include_once('functions.php');

$updatedata = new DB_con();

if (isset($_POST['updatectm'])) {
  $idctm = $_GET['idctm'];
  $prefixctm = $_POST['prefixctm'];
  $fnamectm = $_POST['fnamectm'];
  $lnamectm = $_POST['lnamectm'];
  $emailctm = $_POST['emailctm'];
  $phonectm = $_POST['phonectm'];
  $sql = $updatedata->updatectm($idctm, $prefixctm, $fnamectm, $lnamectm, $emailctm, $phonectm);
  if ($sql) {
    echo "<script>alert('แก้ไข้ข้อมูลเรียบร้อยแล้ว!');</script>";
    echo "<script>window.location.href='customer.php'</script>";
  } else {
    echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
    echo "<script>window.location.href='updatectm.php'</script>";
  }
}

?>
<?php
  $sql1 = $con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
  $query1 = "SELECT * FROM neprefix ORDER BY idpfix asc";
  $result1 = mysqli_query($sql1,$query1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แก้ไขข้อมูล</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1 class="mt-5">แก้ไขข้อมูลลูกค้า</h1>
    <hr>
    <?php
    $idctm = $_GET['idctm'];
    $updateuser = new DB_con();
    $sql = $updateuser->fetchonerecordctm($idctm);
    while ($row = mysqli_fetch_array($sql)) {
    ?>
      <form action="" method="post">
        <div class="mb-3">
          <label for="idctm" class="form-label">รหัสลูกค้า</label>
          <input type="text" class="form-control" name="idctm" value="<?php echo $row['idctm']; ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="prefixctm" class="form-label">เลือกคำนำหน้าชื่อ</label>
          <select class="form-select" aria-label="Default select example" name="prefixctm">
        <option value="">-กรุณาเลือก-</option>
        <?php foreach ($result1 as $results) { ?>
        <option value = "<?php echo $results["nameprefix"]; ?>">
          <?php echo $results["nameprefix"]; ?>
        </option>
        <?php } ?>
        </select>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">ชื่อ</label>
          <input type="text" class="form-control" name="fnamectm" value="<?php echo $row['fnamectm']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">นามสกุล</label>
          <input type="text" class="form-control" name="lnamectm" value="<?php echo $row['lnamectm']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="">อีเมล</label>
          <input type="email" class="form-control" name="emailctm" value="<?php echo $row['emailctm']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="">เบอร์โทร</label>
          <input type="text" class="form-control" name="phonectm" value="<?php echo $row['phonectm']; ?>" required>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" name="updatectm" class="btn btn-success">แก้ไขข้อมูล</button>&nbsp;&nbsp;
        <a type="button" class="btn btn-danger" href="customer.php">&nbsp;&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;&nbsp;</a>
      </form>
  </div>

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