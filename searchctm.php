<?php
$con = mysqli_connect("localhost", "root", "", "main_data") or die("เกิดข้อผิดพลาดเกิดขึ้น");
mysqli_set_charset($con, "utf8");

$ctm_data = $_POST["ctm_data"];

$sql = "SELECT * FROM ctm WHERE fnamectm LIKE '%$ctm_data%' OR lnamectm LIKE '%$ctm_data%' ORDER BY fnamectm ASC ";
$result = mysqli_query($con, $sql);

$count = mysqli_num_rows($result);
$order = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>การจัดการข้อมูลลูกค้า</title>

  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
  <section class="header">

    <nav class="navbar navbar-expand-lg navbar-light ">
      <lable class="logo">
        &nbsp;&nbsp;<img src="Qde-logo2.png" width="45" height="34">
      </lable>
      <a class="nav-link active ">บริษัท คิว.ดี.อี. พรีซิชั่น พาร์ท จำกัด (Q.D.E Precision Part Co.ltd.)
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </a>
      <button type="button" class="btn btn-secondary" disabled>กำหนดสิทธิ์</button>&nbsp;&nbsp;
      <button type="button" class="btn btn-danger">ออกจากระบบ</button>&nbsp;&nbsp;
    </nav>
  </section>

  <div class="container">
    <br>
    <h2 class="text-center">ระบบการจัดการโรงกลึง</h2>
    <h1 class="text-center">Lathe Management</h1>
    <br>
  </div>

  <section class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link active" href="index.php">หน้าแรก</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ข้อมูลพื้นฐาน
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="prefix.php">ข้อมูลคำนำหน้าชื่อ</a></li>
              <li><a class="dropdown-item" href="unit.php">ข้อมูลหน่วยนับ</a></li>
              <li><a class="dropdown-item" href="typeemp.php">ข้อมูลประเภทพนักงาน</a></li>
              <li><a class="dropdown-item" href="typemandq.php">ข้อมูลประเภทวัสดุและอุปกรณ์</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ข้อมูลหลัก
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="customer.php">ข้อมูลลูกค้า</a></li>
              <li><a class="dropdown-item" href="employee.php">ข้อมูลพนักงาน</a></li>
              <li><a class="dropdown-item" href="mande.php">ข้อมูลวัสดุและอุปกรณ์</a></li>
              <li><a class="dropdown-item" href="partner.php">ข้อมูลคู่ค้า</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">ข้อมูลการสั่งซื้อสินค้าจากลูกค้า</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">ข้อมูลการส่งมอบสินค้า</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">ข้อมูลการสั่งซื้อวัสดุและอุปกรณ์</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">ข้อมูลการรับเข้าวัสดุและอุปกรณ์</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">ข้อมูลการเบิกวัสดุและอุปกรณ์</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">ข้อมูลการรับคืนวัสดุและอุปกรณ์</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">การออกรายงาน</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>
  <div class="container">
    <br>
    <h3 class="text-center">การจัดการข้อมูลลูกค้า</h3>
    <hr>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a type="button" class="btn btn-success" href="insertctm.php">
      <iconify-icon icon="carbon:document-add" style="color: white;" width="42" height="42"></iconify-icon>
      </iconify-icon>
    </a>
    <br><br>

    <div class="col-md-7">

      <form action="searchctm.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="ctm_data" required class="form-control" placeholder="กรอกชื่อที่ต้องการจะค้นหา...">
          <button type="submit" class="btn btn-primary">ค้นหา</button>
        </div>
      </form>

    </div>
    <?php if ($count > 0) { ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>รหัสลูกค้า</th>
            <th>คำนำหน้าชื่อ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>อีเมล</th>
            <th>เบอร์โทร</th>
            <th>การดำเนินการ</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row["idctm"]; ?></td>
              <td><?php echo $row["prefixctm"]; ?></td>
              <td><?php echo $row["fnamectm"]; ?></td>
              <td><?php echo $row["lnamectm"]; ?></td>
              <td><?php echo $row["emailctm"]; ?></td>
              <td><?php echo $row["phonectm"]; ?></td>
              <td>
                <a a href="updatectm.php?idctm=<?php echo $row['idctm']; ?>" class="btn btn-primary">
                  <iconify-icon icon="el:file-edit"></iconify-icon>
                </a>
                &nbsp;&nbsp;
                <a href="deletectm.php?delctm=<?php echo $row['idctm']; ?>" class="btn btn-danger">
                  <iconify-icon icon="ant-design:delete-outlined"></iconify-icon>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <div class="alert alert-danger">
        <b>ไม่พบข้อมูลลูกค้า!!</b>
      </div>
    <?php } ?>
    <a href="customer.php" class="btn btn-success">ย้อนกลับ</a>

  </div>
  </div>
  </div>
  </div>
  <br>
  <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>