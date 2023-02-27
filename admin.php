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
    <title>หน้าแรก</title>
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
            </div>
    </nav>
    <br><br>
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
<div class="container">
        <br>
        <h3 class="text-center">การจัดการขื่อผู้ใช้</h3>
        <br>
        <div class="btn-add">
            <a type="button" class="btn btn-success" href="insert_admin.php">
                <iconify-icon icon="carbon:document-add" style="color: white;" width="42" height="42"></iconify-icon>
            </a>
        </div>
        <br>
        <div class="col-md-7">
            <form action="search_admin.php" method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="admin_data" required class="form-control" placeholder="กรอกชื่อที่ต้องการจะค้นหา...">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </form>
        </div>
        <hr>
        <table class="table table-bordered table-striped">
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อรหัสผ่าน</th>
                <th>รหัสผ่าน</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>สถานะผู้ใช้</th>
                <th>การดำเนินการ</th>
            </tr>
            <tbody>
                <?php
                include('condb.php');
                $query = "SELECT * FROM user ORDER BY ID asc" or die("Error:" . mysqli_error());
                $result = mysqli_query($con, $query);
                while ($values = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $values["ID"]; ?></td>
                        <td><?php echo $values["Username"]; ?></td>
                        <td><?php echo $values["Password"]; ?></td>
                        <td><?php echo $values["Firstname"]; ?></td>
                        <td><?php echo $values["Lastname"]; ?></td>
                        <td><?php echo $values["Userlevel"]; ?></td>
                        <td>
                            <a href="update_admin.php?ID=<?php echo $values['ID']; ?>" class="btn btn-primary"><iconify-icon icon="el:file-edit"></iconify-icon></a>
                            <a onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบรายการนี้?')" href="delete_admin.php?ID=<?php echo $values['ID']; ?>" class='btn btn-danger remove'><iconify-icon icon="ant-design:delete-outlined"></iconify-icon></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php }?>