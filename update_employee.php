<?php
require('condb.php');
$employee_number = $_GET["employee_number"];
$sql = "SELECT * FROM tb_employee WHERE employee_number='$employee_number'";
$result = mysqli_query($con, $sql);
$values = mysqli_fetch_assoc($result);
?>
<?php
$sql1 = $con = mysqli_connect("localhost", "root", "", "webdata") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$query1 = "SELECT * FROM tb_nameprefix ORDER BY prefix_number asc";
$result1 = mysqli_query($sql1, $query1);
$query2 = "SELECT * FROM tb_employee_type ORDER BY employee_type_number asc";
$result2 = mysqli_query($sql1, $query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลพนักงาน</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="mt-5">แก้ไขข้อมูลพนักงาน</h1>
        <hr>
        <form action="insertctmdb.php" method="post">
        <input type="hidden" value="<?php echo $values["employee_number"]; ?>" name="employee_number">
            <div class="mb-3">
                <label for="employee_id" class="form-label">รหัสพนักงาน</label>
                <input type="text" class="form-control" name="employee_id" value="<?php echo $values['employee_id']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="ref_nameprefix_number" class="form-label">เลือกคำนำหน้าชื่อ</label>
                <select class="form-select" aria-label="Default select example" name="ref_nameprefix_number" required>
                    <option value="<?php echo $values['ref_nameprefix_number']; ?>>-กรุณาเลือก-</option>
                    <?php foreach ($result1 as $results) { ?>
                        <option value="<?php echo $results["prefix_number"]; ?>">
                            <?php echo $results["prefix_name"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="employee_fname" class="form-label">ชื่อพนักงาน</label>
                <input type="text" class="form-control" name="employee_fname" value="<?php echo $values['employee_fname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="employee_lname" class="form-label">นามสกุลพนักงาน</label>
                <input type="text" class="form-control" name="employee_lname" value="<?php echo $values['employee_lname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="employee_phone">เบอร์โทรพนักงาน</label>
                <input type="text" class="form-control" name="employee_phone" value="<?php echo $values['employee_phone']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="employee_address">ที่อยู่พนักงาน</label>
                <input type="address" class="form-control" name="employee_address" value="<?php echo $values['employee_address']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ref_employee_type_number" class="form-label">ประเภทพนักงาน</label>
                <select class="form-select" aria-label="Default select example" name="ref_employee_type_number" required>
                    <option value="<?php echo $values['ref_employee_type_number']; ?>">-กรุณาเลือก-</option>
                    <?php foreach ($result2 as $results) { ?>
                        <option value="<?php echo $results["employee_type_number"]; ?>">
                            <?php echo $results["employee_type_name"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="employee_license" class="form-label">สิทธิ์การใช้งาน</label>
                <input type="text" class="form-control" name="employee_license" value="<?php echo $values['employee_license']; ?>" readonly>
            </div>
            <button type="submit" name="save" class="btn btn-success">แก้ไขข้อมูล</button>
            <a type="button" class="btn btn-danger" href="employee.php">ยกเลิก</a>
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