<?php
require('condb.php');
$buy_material_number = $_GET["buy_material_number"];
$sql = "SELECT * FROM tb_buy_material WHERE buy_material_number='$buy_material_number'";
$result = mysqli_query($con, $sql);
$values = mysqli_fetch_assoc($result);
?>

<?php
$sql1 = $con = mysqli_connect("localhost", "root", "", "webdata") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$query1 = "SELECT * FROM tb_equipment ORDER BY equipment_number asc";
$result1 = mysqli_query($sql1, $query1);
$query2 = "SELECT * FROM tb_unit ORDER BY unit_number asc";
$result2 = mysqli_query($sql1, $query2);
$query3 = "SELECT * FROM tb_equipment_type ORDER BY equipment_type_number asc";
$result3 = mysqli_query($sql1, $query3);
$query4 = "SELECT * FROM tb_partners ORDER BY partners_number asc";
$result4 = mysqli_query($sql1, $query4);
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
        <title>แก้ไขข้อมูลการสั่งซื้อวัสดุและอุปกรณ์</title>
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            <h1 class="mt-5">แก้ไขข้อมูลการสั่งซื้อวัสดุและอุปกรณ์</h1>
            <hr>
            <form action="insert_buy_material_db.php" method="post">
            <input type="hidden" value="<?php echo $values["buy_material_number"]; ?>" name="buy_material_number">
                <div class="mb-3">
                    <label for="buy_material_id" class="form-label">รหัสสั่งซื้อวัสดุและอุปกรณ์</label>
                    <input type="text" class="form-control" name="buy_material_id"  value="<?php echo $values['buy_material_id']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="buy_material_day" class="form-label">วั่นที่สั่งซื้อ</label>
                    <input type="date" class="form-control" name="buy_material_day" id="buy_material_day" value="<?php echo $values['buy_material_day']; ?>" required>
                    <script type='text/javascript'>
                        var highlight_dates = ['1-5-2020', '11-5-2020', '18-5-2020', '28-5-2020'];

                        $(document).ready(function() {


                            $('#buy_material_day').buy_material_day({
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
                    <label for="buy_material_detail" class="form-label">รายละเอียดการสั่งซื้อวัสดุและอุปกรณ์</label>
                    <input type="text" class="form-control" name="buy_material_detail" value="<?php echo $values['buy_material_detail']; ?>"required>
                </div>
                <div class="mb-3">
                    <label for="ref_equipment_number" class="form-label">เลือกวัสดุและอุปกรณ์</label>
                    <select class="form-select" aria-label="Default select example" name="ref_equipment_number" required>
                        <option value="">-กรุณาเลือก-</option>
                        <?php foreach ($result1 as $results) { ?>
                            <option value="<?php echo $results["equipment_number"]; ?>">
                                <?php echo $results["equipment_name"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="buy_material_quantity">จำนวน</label>
                    <input type="text" class="form-control" name="buy_material_quantity" value="<?php echo $values['buy_material_quantity']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ref_unit_number" class="form-label">เลือกหน่วยนับ</label>
                    <select class="form-select" aria-label="Default select example" name="ref_unit_number" required>
                        <option value="">-กรุณาเลือก-</option>
                        <?php foreach ($result2 as $results) { ?>
                            <option value="<?php echo $results["unit_number"]; ?>">
                                <?php echo $results["unit_name"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ref_equipment_type" class="form-label">เลือกประเภทวัสดุและอุปกรณ์</label>
                    <select class="form-select" aria-label="Default select example" name="ref_equipment_type" required>
                        <option value="">-กรุณาเลือก-</option>
                        <?php foreach ($result3 as $results) { ?>
                            <option value="<?php echo $results["equipment_type_number"]; ?>">
                                <?php echo $results["equipment_type_name"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ref_employee_number" class="form-label">ชื่อพนักงาน</label>
                    <input type="text" class="form-control" name="ref_employee_number" value="<?php echo ($_SESSION['User']); ?> <?php ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="ref_partners_number" class="form-label">เลือกชื่อคู่ค้า</label>
                    <select class="form-select" aria-label="Default select example" name="ref_partners_number" required>
                        <option value="">-กรุณาเลือก-</option>
                        <?php foreach ($result4 as $results) { ?>
                            <option value="<?php echo $results["partners_number"]; ?>">
                                <?php echo $results["partners_fname"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="buy_material_status" class="form-label">สถานะ</label>
                    <input type="text" class="form-control" name="buy_material_status" value="รออนุมัติ" readonly>
                </div>
                <button type="submit" name="save" class="btn btn-success">แก้ไขข้อมูล</button>
                <a type="button" class="btn btn-danger" href="buy_material.php">ยกเลิก</a>
            </form>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
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