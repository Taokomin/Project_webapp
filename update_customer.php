<?php
require('condb.php');
$customer_number = $_GET["customer_number"];
$sql = "SELECT * FROM tb_customer WHERE customer_number='$customer_number'";
$result = mysqli_query($con, $sql);
$values = mysqli_fetch_assoc($result);
?>
<?php
$sql1 = $con = mysqli_connect("localhost", "root", "", "webdata") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$query1 = "SELECT * FROM tb_nameprefix ORDER BY prefix_number asc";
$result1 = mysqli_query($sql1, $query1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แก้ไขข้อมูลลูกค้า</title>
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <h1 class="mt-5">แก้ไขข้อมูลลูกค้า</h1>
    <hr>
    <form action="update_customer_db.php" method="post">
    <input type="hidden" value="<?php echo $values["customer_number"]; ?>" name="customer_number">
      <div class="mb-3">
        <label for="customer_id" class="form-label">รหัสลูกค้า</label>
        <input type="text" class="form-control" name="customer_id" value="<?php echo $values['customer_id']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="ref_nameprefix_number" class="form-label">เลือกคำนำหน้าชื่อ</label>
        <select class="form-select" aria-label="Default select example" name="ref_nameprefix_number"required>
          <option value="<?php echo $values['ref_nameprefix_number']; ?>">-กรุณาเลือก-</option>
          <?php foreach ($result1 as $results) { ?>
            <option value="<?php echo $results["prefix_number"]; ?>">
              <?php echo $results["prefix_name"]; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="customer_fname" class="form-label">ชื่อ</label>
        <input type="text" class="form-control" name="customer_fname" value="<?php echo $values['customer_fname']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="customer_lname" class="form-label">นามสกุล</label>
        <input type="text" class="form-control" name="customer_lname" value="<?php echo $values['customer_lname']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="customer_phone">เบอร์โทร</label>
        <input type="text" class="form-control" name="customer_phone" value="<?php echo $values['customer_phone']; ?>" equired>
      <div class="mb-3">
        <label for="customer_email">อีเมล</label>
        <input type="email" class="form-control" name="customer_email" value="<?php echo $values['customer_email']; ?>" required>
      </div>
      </div>
      <button type="submit" name="save" class="btn btn-success">แก้ไขข้อมูล</button>
      <a type="button" class="btn btn-danger" href="customer.php">ยกเลิก</a>
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