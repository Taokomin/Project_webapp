<?php
require('condb.php');
$unit_number = $_GET["unit_number"];
$sql = "SELECT * FROM tb_unit WHERE unit_number='$unit_number'";
$result = mysqli_query($con, $sql);
$values = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insert.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>แก้ไขข้อมูลหน่วยนับ</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">แก้ไขข้อมูลหน่วยนับ</h1>
        <hr>
        <form action="update_unit_db.php" method="post">
            <input type="hidden" value="<?php echo $values["unit_number"]; ?>" name="unit_number">
            <div class="mb-3">
                <label for="unit_id" class="form-label">รหัสคำนำหน้าชื่อ</label>
                <input type="text" class="form-control" name="unit_id" value="<?php echo $values['unit_id']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="unit_name" class="form-label">หน่วยนับ</label>
                <input type="text" class="form-control" name="unit_name" value="<?php echo $values['unit_name']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-success">แก้ไขข้อมูล </button>
            <a type="button" class="btn btn-danger" href="unit.php">ยกเลิก</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
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