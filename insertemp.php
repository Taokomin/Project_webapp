<?php

include_once('functions.php');
$insertdata = new DB_con();
if (isset($_POST['insertemp'])) {
  $idemp = $_POST['idemp'];
  $prefixemp = $_POST['prefixemp'];
  $fnameemp = $_POST['fnameemp'];
  $lnameemp = $_POST['lnameemp'];
  $phoneemp = $_POST['phoneemp'];
  $addressemp = $_POST['addressemp'];
  $tyemp = $_POST['tyemp'];
  $stemp = $_POST['stemp'];
  $sql = $insertdata->insertemp($idemp, $prefixemp, $fnameemp, $lnameemp, $phoneemp, $addressemp, $tyemp, $stemp);

  if ($sql) {
    echo "<script>alert('เพิ่มข้อมูลเรียบร้อยแล้ว!');</script>";
    echo "<script>window.location.href='employee.php'</script>";
  } else {
    echo "<script>alert('บางอย่างผิดพลาด! กรุณาลองอีกครั้ง!');</script>";
    echo "<script>window.location.href='employee.php'</script>";
  }
}
?>
<?php
$con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
if (!$con) mysqli_connect_errno();

$GLOBALS['maxIdLength'] = 3;
$GLOBALS['idemp'] = '0';

$sql = "SELECT idemp FROM emp ORDER BY idemp DESC LIMIT 1";
$query = $con->query($sql);
$result = $query->fetch_assoc();

if ($result['idemp']) {
  $GLOBALS['idemp'] = $result['idemp'];
}

function increaseId($idemp)
{
  $matchId = preg_replace('/[^0-9]/', '', $idemp);
  $convertStringToInt = (int)$matchId;

  $concatIdWithString = (string)($convertStringToInt + 1);

  $round = 0;
  while ($round < $GLOBALS['maxIdLength'] - strlen($concatIdWithString)) {
    $concatIdWithString = '0' . $concatIdWithString;
    $round += 1;
  }

  return 'EM' . $concatIdWithString;
}
?>
<?php
$sql1 = $con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$query1 = "SELECT * FROM neprefix ORDER BY idpfix asc";
$result1 = mysqli_query($sql1, $query1);

$query2 = "SELECT * FROM typeemp ORDER BY idte asc";
$result2 = mysqli_query($sql1, $query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เพิ่มข้อมูลพนักงาน</title>
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <h1 class="mt-5">เพิ่มข้อมูลพนักงาน</h1>
    <hr>
    <form action="" method="post">
      <div class="mb-3">
        <label for="idemp" class="form-label">รหัสพนักงาน</label>
        <input type="text" class="form-control" name="idemp" value="<?php echo (increaseId($GLOBALS['idemp'])); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="prefixemp" class="form-label">เลือกคำนำหน้าชื่อ</label>
        <select class="form-select" aria-label="Default select example" name="prefixemp">
          <option value="">-กรุณาเลือก-</option>
          <?php foreach ($result1 as $results) { ?>
            <option value="<?php echo $results["nameprefix"]; ?>">
              <?php echo $results["nameprefix"]; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="fnameemp" class="form-label">ชื่อ</label>
        <input type="text" class="form-control" name="fnameemp" required>
      </div>
      <div class="mb-3">
        <label for="lnameemp" class="form-label">นามสกุล</label>
        <input type="text" class="form-control" name="lnameemp" required>
      </div>
      <div class="mb-3">
        <label for="phoneemp">เบอร์โทร</label>
        <input type="text" class="form-control" name="phoneemp" required>
      </div>
      <div class="mb-3">
        <label for="addressemp">ที่อยู่พนักงาน</label>
        <input type="text" class="form-control" name="addressemp" required>
      </div>
      <div class="mb-3">
        <label for="tyemp" class="form-label">เลือกประเภทพนักงาน</label>
        <select class="form-select" aria-label="Default select example" name="tyemp">
        <option value="">-กรุณาเลือก-</option>
          <?php foreach ($result2 as $results) { ?>
            <option value="<?php echo $results["demp"]; ?>">
              <?php echo $results["demp"]; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="stemp" class="form-label">สิทธิ์การใช้งาน</label>
        <input type="text" class="form-control" name="stemp" value="พนักงาน" readonly>
      </div>
      &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="submit" name="insertemp" class="btn btn-success">เพิ่มข้อมูล</button>&nbsp;&nbsp;
      <a type="button" class="btn btn-danger" href="employee.php">&nbsp;&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;&nbsp;</a>
    </form>
  </div>
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