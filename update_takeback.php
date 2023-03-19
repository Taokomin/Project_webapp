<?php
require('condb.php');
$takeback_number = $_GET["takeback_number"];
$sql = "SELECT * FROM tb_takeback WHERE takeback_number = '$takeback_number'";
$result = mysqli_query($con, $sql);
$values = mysqli_fetch_assoc($result);
?>
<?php
$sql1 = $con = mysqli_connect("localhost", "root", "", "webdata") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$query1 = "SELECT * FROM tb_pickup_material ORDER BY pickup_material_number asc";
$result1 = mysqli_query($sql1, $query1);
?>
<?php
isset($_POST['date']) ? $date = $_POST['date'] : $date = "";
if (!empty($date)) {
    echo "<div style='margin-top:1rem;'>คุณเลือกวันที่ {$date}</div>";
}
?>

<?php session_start(); ?>
<?php

if (!$_SESSION["UserID"]) {

    Header("Location: index.php");
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>แก้ไขข้อมูลการส่งมอบสินค้า</title>
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    </head>

    <body>
        <div class="container">
            <h1 class="mt-5">แก้ไขข้อมูลการเบิกวัสดุและอุปกรณ์</h1>
            <hr>
            <form id="myForm" method="GET">


                <div class="mb-3">
                    <label for="takeback_id" class="form-label">รหัสส่งมอบ</label>
                    <input type="text" class="form-control" name="takeback_id" value="<?php echo $values['takeback_id']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="takeback_day" class="form-label">วันที่ส่งมอบ</label>
                    <input type="date" class="form-control" name="takeback_day" id="takeback_day" value="<?php echo $values['takeback_day']; ?>" required>
                    <script type='text/javascript'>
                        var highlight_dates = ['1-5-2020', '11-5-2020', '18-5-2020', '28-5-2020'];

                        $(document).ready(function() {


                            $('#takeback_day').takeback_day({
                                beforeShowDay: function(date) {
                                    var month = date.getMonth() + 1;
                                    var year = date.getFullYear();
                                    var day = date.getDate();
                                    var newdate = day + "-" + month + '-' + year;
                                    var tooltip_text = "New event on " + newdate;
                                    if ($.inArray(newdate, highlight_dates) != -1) {
                                        return [true, "highlight", tooltip_text];
                                    }
                                    return [true];
                                }
                            });
                        });
                    </script>
                </div>
                <div class="mb-3">
                    <label for="searchInput" class="form-label">รหัสสั่งซื้อสินค้าจากลูกค้า</label>
                    <select class="form-select" aria-label="Default select example" name="ref_equipment_id" required>
                        <option value="">-กรุณาเลือก-</option>
                        <?php foreach ($result1 as $results) { ?>
                            <option value="<?php echo $results["pickup_material_id"]; ?>">
                                <?php echo $results["pickup_material_id"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ref_equipment_name" class="form-label">สินค้าที่สั่งทำ</label>
                    <input type="text" class="form-control" name="ref_equipment_name" value="<?php echo $values['ref_equipment_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ref_equipment_quantity" class="form-label">จำนวน</label>
                    <input type="text" class="form-control" name="ref_equipment_quantity" value="<?php echo $values['ref_equipment_quantity']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ref_unit_name" class="form-label">หน่วยนับ</label>
                    <input type="text" class="form-control" name="ref_unit_name" value="<?php echo $values['ref_unit_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ref_equipment_type_number" class="form-label">ประเภทวัสดุและอุปกรณ์</label>
                    <input type="text" class="form-control" name="ref_equipment_type_number" value="<?php echo $values['ref_equipment_type_number']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ref_employee_number" class="form-label">ชื่อพนักงาน</label>
                    <input type="text" class="form-control" name="ref_employee_number" value="<?php echo ($_SESSION['User']); ?> <?php ?>" readonly>
                </div>
                <button type="submit" class="btn btn-success" name="save" onclick="submitData()">แก้ไขข้อมูล</button>
                <a type="button" class="btn btn-danger" href="takeback.php">ยกเลิก</a>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php } ?>
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