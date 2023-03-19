<?php session_start();?>
<?php 
 
if (!$_SESSION["UserID"]){
 
	  Header("Location: index.php");
 
}else{?>
<!DOCTYPE html>
<html lang="th9o08ikj #']">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การจัดการข้อมูลการสั่งซื้อสินค้าจากลูกค้า</title>
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
        <a><iconify-icon icon="gg:profile" width="32" height="32"></iconify-icon><?php echo ($_SESSION['User']);?> <?php ?></a>
        </div>
        <div >
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
                            <li><a class="dropdown-item" href="material_equipment.php">ข้อมูลประเภทวัสดุและอุปกรณ์</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ข้อมูลหลัก
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
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
                </ul>
            </div>
    </nav>
    <div class="container">
        <?php
        include('condb.php');
        mysqli_set_charset($con, "utf8");
        $customer_order_data = $_POST["customer_order_data"];
        $sql = "SELECT * FROM tb_customer_order WHERE customer_order_id LIKE '%$customer_order_data%' OR customer_order_id LIKE '%$customer_order_data%' ORDER BY customer_order_id ASC ";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        $order = 1;
        ?>
        <br>
        <h3 class="text-center">การจัดการข้อมูลการสั่งซื้อสินค้าจากลูกค้า</h3>
        <br>
        <div class="btn-add">
            <a type="button" class="btn btn-success" href="insert_customer_order.php">
                <iconify-icon icon="carbon:document-add" style="color: white;" width="42" height="42"></iconify-icon>
            </a>
        </div>
        <br>
        <div class="col-md-7">
            <form action="search_customer.php" method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="customer_order_data" required class="form-control" placeholder="กรอกชื่อที่ต้องการจะค้นหา...">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </form>
        </div>
        <hr>
        <?php if ($count > 0) { ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รหัส</th>
                        <th>วั่นที่สั่ง</th>
                        <th>รายละเอียดการสั่งสินค้า</th>
                        <th>จำนวน</th>
                        <th>หน่วยนับ</th>
                        <th>ลูกค้า</th>
                        <th>พนักงาน</th>
                        <th>การดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('condb.php');
                    $query = "
                    SELECT co.*, u.unit_name , c.customer_fname , e.employee_fname
                    FROM tb_customer_order as co
                    INNER JOIN tb_unit as u ON co.ref_unit_number = u.unit_number
                    INNER JOIN tb_customer as c ON  co.ref_customer_number = c.customer_number
                    INNER JOIN tb_employee as e ON co.ref_employee_number = e.employee_number
                    ORDER BY u.unit_number , c.customer_number , e.employee_number ASC;
                    ";  
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                        <td><?php echo $row["customer_order_number"]; ?></td>
                        <td><?php echo $row["customer_order_id"]; ?></td>
                        <td><?php echo $row["customer_order_day"]; ?></td>
                        <td><?php echo $row["customer_order_detail"]; ?></td>
                        <td><?php echo $row["customer_order_quantity"]; ?></td>
                        <td><?php echo $row["unit_name"]; ?></td>
                        <td><?php echo $row["customer_fname"]; ?></td>
                        <td><?php echo $row["employee_fname"]; ?></td>
                        <td>
                                <a href="update_customer_order_number.php?customer_order_number=<?php echo $row['customer_order_number']; ?>" class="btn btn-primary"><iconify-icon icon="el:file-edit"></iconify-icon></a>
                                <a onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบรายการนี้?')" href="delete_customer_order_number.php?customer_order_number=<?php echo $row['customer_order_number']; ?>" class='btn btn-danger'><iconify-icon icon="ant-design:delete-outlined"></iconify-icon></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-danger">
                <b>ไม่พบข้อมูลการสั่งซื้อสินค้าจากลูกค้า!!</b>
            </div>
        <?php } ?>
        <a href="customer_order.php" class="btn btn-success">ย้อนกลับ</a>

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
<?php }?>