<?php
$con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
if (!$con) mysqli_connect_errno();

$GLOBALS['maxIdLength'] = 3;
$GLOBALS['idptn'] = '0';

$sql = "SELECT idptn FROM ptn ORDER BY idptn DESC LIMIT 1";
$query = $con->query($sql);
$result = $query->fetch_assoc();

if ($result['idptn']) {
  $GLOBALS['idptn'] = $result['idptn'];
}

function increaseId($idptn)
{
  $matchId = preg_replace('/[^0-9]/', '', $idptn);
  $convertStringToInt = (int)$matchId;

  $concatIdWithString = (string)($convertStringToInt + 1);

  $round = 0;
  while ($round < $GLOBALS['maxIdLength'] - strlen($concatIdWithString)) {
    $concatIdWithString = '0' . $concatIdWithString;
    $round += 1;
  }

  return 'PR' . $concatIdWithString;
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
  <title>เพิ่มข้อมูลคู่ค้า</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <h1 class="mt-5">เพิ่มข้อมูลคู่ค้า</h1>
    <hr>
    <form action="insertpartnerdb.php" method="post">
      <div class="mb-3">
        <label for="idptn" class="form-label">รหัสคู่ค้า</label>
        <input type="text" class="form-control" name="idptn" value="<?php echo (increaseId($GLOBALS['idptn'])); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="prefixptn" class="form-label">เลือกคำนำหน้าชื่อ</label>
        <select class="form-select" aria-label="Default select example" name="prefixptn">
          <option value="">-กรุณาเลือก-</option>
          <?php foreach ($result1 as $results) { ?>
            <option value="<?php echo $results["nameprefix"]; ?>">
              <?php echo $results["nameprefix"]; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="fnameptn" class="form-label">ชื่อผู้ติดต่อ</label>
        <input type="text" class="form-control" name="fnameptn" required>
      </div>
      <div class="mb-3">
        <label for="lnameptn" class="form-label">นามสกุลผู้ติดต่อ</label>
        <input type="text" class="form-control" name="lnameptn" required>
      </div>
      <div class="mb-3">
        <label for="phoneptn">เบอร์โทร</label>
        <input type="email" class="form-control" name="phoneptn" required>
      </div>
      <div class="mb-3">
        <label for="cnameptn">บริษัทคู่ค้า</label>
        <input type="text" class="form-control" name="cnameptnss" required>
      </div>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="submit" name="save" class="btn btn-success">เพิ่มข้อมูล</button>&nbsp;&nbsp;
      <a type="button" class="btn btn-danger" href="partner.php">&nbsp;&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;&nbsp;</a>
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