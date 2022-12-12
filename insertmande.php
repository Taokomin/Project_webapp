<?php
$con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
if (!$con) mysqli_connect_errno();

$GLOBALS['maxIdLength'] = 3;
$GLOBALS['idmande'] = '0';

$sql = "SELECT idmande FROM mandedb ORDER BY idmande DESC LIMIT 1";
$query = $con->query($sql);
$result = $query->fetch_assoc();

if ($result['idmande']) {
  $GLOBALS['idmande'] = $result['idmande'];
}

function increaseId($idmande)
{
  $matchId = preg_replace('/[^0-9]/', '', $idmande);
  $convertStringToInt = (int)$matchId;

  $concatIdWithString = (string)($convertStringToInt + 1);

  $round = 0;
  while ($round < $GLOBALS['maxIdLength'] - strlen($concatIdWithString)) {
    $concatIdWithString = '0' . $concatIdWithString;
    $round += 1;
  }

  return 'MR' . $concatIdWithString;
}
?>
<?php
  $sql1 = $con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
  $query1 = "SELECT * FROM unitdb ORDER BY idunit asc";
  $result1 = mysqli_query($sql1,$query1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เพิ่มข้อมูลวัสดุและอุปกรณ์</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <h1 class="mt-5">เพิ่มข้อมูลวัสดุและอุปกรณ์</h1>
    <hr>
    <form action="insertmandedb.php" method="post">
      <div class="mb-3">
        <label for="idmande" class="form-label">รหัสวัสดุและอุปกรณ์</label>
        <input type="text" class="form-control" name="idmande" value="<?php echo (increaseId($GLOBALS['idmande'])); ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="mande" class="form-label">ชื่อวัสดุและอุปกรณ์</label>
        <input type="text" class="form-control" name="mande" required>
      </div>
      <div class="mb-3">
        <label for="mandeqty" class="form-label">จำนวน</label>
        <input type="text" class="form-control" name="mandeqty" required>
      </div>
      <div class="mb-3">
        <label for="mandeunit" class="form-label">หน่วยนับ</label>
        <select class="form-select" aria-label="Default select example" name="mandeunit" required>
          <option value="">-กรุณาเลือก-</option>
          <?php foreach ($result1 as $results) { ?>
            <option value="<?php echo $results["unitt"]; ?>">
              <?php echo $results["unitt"]; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="tmqmande" class="form-label">ประเภทวัสดุและอุปกรณ์</label>
        <select class="form-select" aria-label="Default select example" name="tmqmande" required>
          <option selected>-กรุณาเลือก-</option>
          <option value="ใช้แล้วหมดไป">ใช้แล้วหมดไป</option>
          <option value="ใช้แล้วไม่หมดไป">ใช้แล้วไม่หมดไป</option>
        </select>
      </div>
      &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="submit" name="save" class="btn btn-success">เพิ่มข้อมูล</button>&nbsp;&nbsp;
      <a type="button" class="btn btn-danger" href="mande.php">&nbsp;&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;&nbsp;</a>
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