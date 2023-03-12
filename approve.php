<?php
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    mysqli_query($con, "update login set status='$status' where id='$id'");
    header("location:index.php");
    die();
}
?>
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
        <title>การจัดการข้อมูลการสั่งซื้อวัสดุและอุปกรณ์</title>
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
                            <a class="nav-link active" href="#">ข้อมูลการเบิกวัสดุและอุปกรณ์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">ข้อมูลการรับคืนวัสดุและอุปกรณ์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">การออกรายงาน</a>
                        </li>
                    </ul>
                    </ul>
                </div>
        </nav>

        <div class="container">
            <br>
            <h3 class="text-center">การจัดการข้อมูลการสั่งซื้อวัสดุและอุปกรณ์</h3>
            <br>
            <br>
            <div class="col-md-7">
                <form action="search_buy_material.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="buy_material_data" required class="form-control" placeholder="กรอกชื่อที่ต้องการจะค้นหา...">
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                    </div>
                </form>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ลำดับ</th>
                        <th>รหัสสั่งซื้อวัสดุและอุปกรณ์</th>
                        <th>วั่นที่สั่งซื้อ</th>
                        <th>รายละเอียดการสั่งซื้อวัสดุและอุปกรณ</th>
                        <th>วัสดุและอุปกรณ์</th>
                        <th>จำนวน</th>
                        <th>หน่วยนับ</th>
                        <th>ประเภทวัสดุและอุปกรณ์</th>
                        <th>พนักงาน</th>
                        <th>คู่ค้า</th>
                        <th>สถานะ</th>
                        <th>การดำเนินการ</th>
                    </tr>
                    <tbody>
                        <?php
                        include('condb.php');

                        $query = "SELECT bm.*, eq.equipment_name, u.unit_name, et.equipment_type_name, p.partners_fname FROM tb_buy_material as bm
                        INNER JOIN tb_equipment as eq ON bm.ref_equipment_number = eq.equipment_number
                        INNER JOIN tb_unit as u ON bm.ref_unit_number = u.unit_number
                        INNER JOIN tb_equipment_type as et ON bm.ref_equipment_type = et.equipment_type_number
                        INNER JOIN tb_partners as p ON bm.ref_partners_number = p.partners_number
                        ORDER BY eq.equipment_number, u.unit_number, et.equipment_type_number, p.partners_number asc" or die("Error:" . mysqli_error());
                        $result = mysqli_query($con, $query);
                        while ($values = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $values["buy_material_number"]; ?></td>
                                <td><?php echo $values["buy_material_id"]; ?></td>
                                <td><?php echo $values["buy_material_day"]; ?></td>
                                <td><?php echo $values["buy_material_detail"]; ?></td>
                                <td><?php echo $values["equipment_name"]; ?></td>
                                <td><?php echo $values["buy_material_quantity"]; ?></td>
                                <td><?php echo $values["unit_name"]; ?></td>
                                <td><?php echo $values["equipment_type_name"]; ?></td>
                                <td><?php echo $values["ref_employee_number"]; ?></td>
                                <td><?php echo $values["partners_fname"]; ?></td>
                                <td><?php echo $values["buy_material_status"]; ?></td>
                                <td>
                                    <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $values['id'] ?>')">
                                        <option value="">อัปเดตสถานะ</option>
                                        <option value="1">ไม่อนุมัติ</option>
                                        <option value="2">อนุมัติ</option>
                                    </select>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    </body>

    </html>
<?php } ?>