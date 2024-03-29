<?php session_start(); ?>
<?php

if (!$_SESSION["UserID"]) {

    Header("Location: index.php");
} else { ?>
    <!DOCTYPE html>
    <html lang="th9o08ikj #']">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>การจัดการข้อมูลพนักงาน</title>
        <link rel="stylesheet" href="mystyle.css">
        <link rel="stylesheet" href="welcome.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="">
                <img src="Qde-logo2.png" width="45" height="34" class="navbar-brand">
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li>
                        <a>บริษัท คิว.ดี.อี. พรีซิชั่น พาร์ท จำกัด (Q.D.E Precision Part Co.ltd.)</a>
                    </li>
            </div>
            <div>
                <a><iconify-icon icon="gg:profile" width="32" height="32"></iconify-icon><?php echo ($_SESSION['User']); ?> <?php ?></a>
            </div>
            <div>
                <a type="button" class="btn btn-danger btn-sm" href="logout.php">ออกจากระบบ</a>
            </div>
        </nav>
        <div>
            <br>
            <h2 class="text-center">ระบบการจัดการโรงกลึง</h2>
            <h1 class="text-center">Lathe Management</h1>
            <br>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">หน้าแรก</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ข้อมูลพื้นฐาน
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="name_prefix.php">ข้อมูลคำนำหน้าชื่อ</a></li>
                                <li><a class="dropdown-item" href="unit.php">ข้อมูลหน่วยนับ</a></li>
                                <li><a class="dropdown-item" href="employee_type.php">ข้อมูลประเภทพนักงาน</a></li>
                                <li><a class="dropdown-item" href="equipment_type.php">ข้อมูลประเภทวัสดุและอุปกรณ์</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ข้อมูลหลัก
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="customer.php">ข้อมูลลูกค้า</a></li>
                                <li><a class="dropdown-item" href="employee.php">ข้อมูลพนักงาน</a></li>
                                <li><a class="dropdown-item" href="equipment.php">ข้อมูลวัสดุและอุปกรณ์</a></li>
                                <li><a class="dropdown-item" href="partners.php">ข้อมูลคู่ค้า</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="customer_order.php">ข้อมูลการสั่งซื้อสินค้าจากลูกค้า</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="deliver.php">ข้อมูลการส่งมอบสินค้า</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="buy_material.php">ข้อมูลการสั่งซื้อวัสดุและอุปกรณ์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="accept_material.php">ข้อมูลการรับเข้าวัสดุและอุปกรณ์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="pickup_material.php">ข้อมูลการเบิกวัสดุและอุปกรณ์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="takeback.php">ข้อมูลการรับคืนวัสดุและอุปกรณ์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="report.php">การออกรายงาน</a>
                        </li>
                    </ul>
                    </ul>
                </div>
        </nav>

        <div class="container">
            <br>
            <h3 class="text-center">การจัดการข้อมูลพนักงาน</h3>
            <br>
            <div class="btn-add">
                <a type="button" class="btn btn-success" href="insert_employee.php">
                    <iconify-icon icon="carbon:document-add" style="color: white;" width="42" height="42"></iconify-icon>
                </a>
            </div>
            <br>
            <div class="col-md-7">
                <form action="search_employee.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="employee_data" required class="form-control" placeholder="กรอกชื่อที่ต้องการจะค้นหา...">
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                    </div>
                </form>
            </div>
            <hr>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ลำดับ</th>
                    <th>รหัส</th>
                    <th>คำนำหน้าชื่อ</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>เบอร์โทร</th>
                    <th>ที่อยู่</th>
                    <th>ประเภท</th>
                    <th>สิทธิ์การใช้งาน</th>
                    <th>การดำเนินการ</th>
                </tr>
                <tbody>
                    <?php
                    include('condb.php');
                    $query = "
                    SELECT e.*, n.prefix_name, t.employee_type_name
                    FROM tb_employee as e
                    INNER JOIN tb_nameprefix as n ON e.ref_nameprefix_number = n.prefix_number
                    INNER JOIN tb_employee_type as t ON e.ref_employee_type_number = t.employee_type_number
                    ORDER BY n.prefix_number ASC, t.employee_type_name ASC;
                    ";
                    $result = mysqli_query($con, $query);
                    while ($values = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $values["employee_number"]; ?></td>
                            <td><?php echo $values["employee_id"]; ?></td>
                            <td><?php echo $values["prefix_name"]; ?></td>
                            <td><?php echo $values["employee_fname"]; ?></td>
                            <td><?php echo $values["employee_lname"]; ?></td>
                            <td><?php echo $values["employee_phone"]; ?></td>
                            <td><?php echo $values["employee_address"]; ?></td>
                            <td><?php echo $values["employee_type_name"]; ?></td>
                            <td><?php echo $values["employee_license"]; ?></td>
                            <td>
                                <a href="update_employee.php?employee_number=<?php echo $values['employee_number']; ?>" class="btn btn-primary"><iconify-icon icon="el:file-edit"></iconify-icon></a>
                                <a onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบรายการนี้?')" href="delete_employee.php?employee_number=<?php echo $values['employee_number']; ?>" class='btn btn-danger remove'><iconify-icon icon="ant-design:delete-outlined"></iconify-icon></a>
                            </td>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    </body>

    </html>
<?php } ?>