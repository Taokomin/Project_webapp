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
    <title>อนุมัติการเบิกวัสดุและอุปกรณ์</title>
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
                            <a class="nav-link active" href="admin.php">หน้าแรก</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                รายการอนุมัติ
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="user.php">รหัสผ่าน</a></li>
                                <li><a class="dropdown-item" href="approve_buy_material.php">อนุมัติการสั่งซื้อวัสดุและอุปกรณ์</a></li>
                                <li><a class="dropdown-item" href="approve_pickup_material.php">อนุมัติการเบิกวัสดุและอุปกรณ์</a></li>
                            </ul>
                        </li>
                    </ul>
                    </ul>
                </div>
        </nav>

    <div class="container">
        <br>
        <h3 class="text-center">อนุมัติการเบิกวัสดุและอุปกรณ์</h3>
        <br>
        <br>
        <div class="col-md-7">
            <form action="sapprove_pickup_material.php" method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="pickup_material_data" required class="form-control" placeholder="กรอกชื่อที่ต้องการจะค้นหา...">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </form>
        </div>
        <hr>
        <table class="table table-bordered table-striped">
            <tr>
                <th>ลำดับ</th>
                <th>รหัสเบิก</th>
                <th>วั่นที่เบิก</th>
                <th>รหัสวัสดุและอุปกรณ์</th>
                <th>วัสดุและอุปกรณ์</th>
                <th>จำนวน</th>
                <th>รหัสหน่วยนับ</th>
                <th>รหัสประเภทวัสดุและอุปกรณ์</th>
                <th>พนักงาน</th>
                <th>สถานะ</th>
                <th>การดำเนินการ</th>
            </tr>
            <tbody>
                <?php
                include('condb.php');
                // $query = "
                // SELECT d.*, co.customer_order_detail
                // FROM tb_deliver as d
                // INNER JOIN tb_customer_order as co ON  d.ref_customer_order_number = co.customer_order_number
                // ORDER BY co.customer_order_number ASC;
                // ";
                $query = "SELECT * FROM tb_pickup_material ORDER BY pickup_material_number asc" or die("Error:" . mysqli_error());
                $result = mysqli_query($con, $query);
                while ($values = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $values["pickup_material_number"]; ?></td>
                        <td><?php echo $values["pickup_material_id"]; ?></td>
                        <td><?php echo $values["pickup_material_day"]; ?></td>
                        <td><?php echo $values["ref_equipment_id"]; ?></td>
                        <td><?php echo $values["ref_equipment_name"]; ?></td>
                        <td><?php echo $values["ref_equipment_quantity"]; ?></td>
                        <td><?php echo $values["ref_unit_name"]; ?></td>
                        <td><?php echo $values["ref_equipment_type_number"]; ?></td>
                        <td><?php echo $values["ref_employee_number"]; ?></td>
                        <td><?php echo $values["ref_pickup_material_status"]; ?></td>
                        <td>
                            <a href="yapprove_pickup_material.php?pickup_material_number=<?php echo $values['pickup_material_number']; ?>" class="btn btn-primary"><iconify-icon icon="flat-color-icons:approve"></iconify-icon></a>
                            <a onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบรายการนี้?')" href="xapprove_pickup_material.php?pickup_material_number=<?php echo $values['pickup_material_number']; ?>" class='btn btn-danger remove'><iconify-icon icon="flat-color-icons:disapprove"></iconify-icon></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>
<?php }?>