<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าแรก</title>

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
      <div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
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
      </div>
    </nav>
  </section>
  <br><br><br><br><br>
  <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>
<div class="container">
  <h2 class="title">
    <span class="title-word title-word-1">ยิน</span>
    <span class="title-word title-word-2">ดี</span>
    <span class="title-word title-word-3">ต้อน</span>
    <span class="title-word title-word-4">รับ</span>
  </h2>
</div>
<style>
  .title-word {
    animation: color-animation 4s linear infinite;
  }

  .title-word-1 {
    --color-1: #03018C;
    --color-2: #212AA5;
    --color-3: #4259C3;
  }

  .title-word-2 {
    --color-1: #212AA5;
    --color-2: #4259C3;
    --color-3: #03018C;
  }

  .title-word-3 {
    --color-1: #4259C3;
    --color-2: #03018C;
    --color-3: #212AA5;
  }

  .title-word-4 {
    --color-1: #03018C;
    --color-2: #212AA5;
    --color-3: #4259C3;
  }

  @keyframes color-animation {
    0% {
      color: var(--color-1)
    }

    32% {
      color: var(--color-1)
    }

    33% {
      color: var(--color-2)
    }

    65% {
      color: var(--color-2)
    }

    66% {
      color: var(--color-3)
    }

    99% {
      color: var(--color-3)
    }

    100% {
      color: var(--color-1)
    }
  }

  /* Here are just some visual styles. 🖌 */


  .title {
    font-family: "Montserrat", sans-serif;
    font-weight: 800;
    font-size: 8.5vw;
    text-transform: uppercase;
    place-items: center;
    text-align: center;

  }
</style>