<?php
include('condb.php');
if (!$con) mysqli_connect_errno();

$GLOBALS['maxIdLength'] = 3;
$GLOBALS['deliver_number'] = '0';

$sql = "SELECT pickup_material_id FROM tb_pickup_material ORDER BY pickup_material_id DESC LIMIT 1";
$query = $con->query($sql);
$result = $query->fetch_assoc();

if ($result['pickup_material_id']) {
    $GLOBALS['pickup_material_id'] = $result['pickup_material_id'];
}

function increaseId($pickup_material_id)
{
    $matchId = preg_replace('/[^0-9]/', '', $pickup_material_id);
    $convertStringToInt = (int)$matchId;

    $concatIdWithString = (string)($convertStringToInt + 1);

    $round = 0;
    while ($round < $GLOBALS['maxIdLength'] - strlen($concatIdWithString)) {
        $concatIdWithString = '0' . $concatIdWithString;
        $round += 1;
    }

    return 'PM' . $concatIdWithString;
}
?>
<?php
$sql1 = $con = mysqli_connect("localhost", "root", "", "webdata") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$query1 = "SELECT * FROM tb_equipment ORDER BY equipment_number asc";
$result1 = mysqli_query($sql1, $query1);
$query2 = "SELECT * FROM tb_employee ORDER BY employee_number asc";
$result2 = mysqli_query($sql1, $query2);
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
        <title>เพิ่มข้อมูลการส่งมอบสินค้า</title>
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    </head>

    <body>
        <div class="container">
            <h1 class="mt-5">เพิ่มข้อมูลการเบิกวัสดุและอุปกรณ์</h1>
            <hr>
            <form id="myForm" method="GET">


                <div class="mb-3">
                    <label for="pickup_material_id" class="form-label">รหัสส่งมอบ</label>
                    <input type="text" class="form-control" name="pickup_material_id" value="<?php echo (increaseId($GLOBALS['pickup_material_id'])); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="pickup_material_day" class="form-label">วันที่ส่งมอบ</label>
                    <input type="date" class="form-control" name="pickup_material_day" id="pickup_material_day" value="<?php echo date('Y-m-d'); ?>" required>
                    <script type='text/javascript'>
                        var highlight_dates = ['1-5-2020', '11-5-2020', '18-5-2020', '28-5-2020'];

                        $(document).ready(function() {


                            $('#pickup_material_day').pickup_material_day({
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
                        <option value="<?php if (isset($_GET['ref_equipment_id'])) {
                                            echo $_GET['ref_equipment_id'];
                                        } ?>">-กรุณาเลือก-</option>
                        <?php foreach ($result1 as $results) { ?>
                            <option value="<?php echo $results["equipment_id"]; ?>">
                                <?php echo $results["equipment_id"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" id="searchBtn" onclick="submitSearch()">ค้นหา</button>
                </div>
                <script>
                    function submitSearch() {
                        document.getElementById("myForm").action = "";
                        document.getElementById("myForm").method = "GET";
                        document.getElementById("myForm").submit();
                    }

                    function submitData() {
                        document.getElementById("myForm").action = "insert_pickup_material_db.php";
                        document.getElementById("myForm").method = "post";
                        document.getElementById("myForm").submit();
                    }
                </script>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "webdata");
                        if (isset($_GET['ref_equipment_id'])) {
                            $ref_equipment_id = $_GET['ref_equipment_id'];
                            $query = "SELECT e.*, u.unit_name, et.equipment_type_name
                            FROM tb_equipment AS e
                            INNER JOIN tb_unit AS u ON e.ref_unit_number = u.unit_number
                            INNER JOIN tb_equipment_type AS et ON e.ref_equipment_type_number = et.equipment_type_number
                            WHERE equipment_id='$ref_equipment_id'
                            ORDER BY u.unit_number, et.equipment_type_number ASC";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                        ?>
                                    <div class="mb-3">
                                        <label for="ref_equipment_name" class="form-label">สินค้าที่สั่งทำ</label>
                                        <input type="text" class="form-control" name="ref_equipment_name" value="<?= $row['equipment_name']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_equipment_quantity" class="form-label">จำนวน</label>
                                        <input type="text" class="form-control" name="ref_equipment_quantity" value="<?= $row['equipment_quantity']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_unit_name" class="form-label">หน่วยนับ</label>
                                        <input type="text" class="form-control" name="ref_unit_name" value="<?= $row['unit_name']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_equipment_type_number" class="form-label">รหัสประเภทวัสดุและอุปกรณ์</label>
                                        <input type="text" class="form-control" name="ref_equipment_type_number" value="<?= $row['equipment_type_name']; ?>" readonly>
                                    </div>
                        <?php
                                }
                            } else {
                                echo "ไม่พบบันทึก";
                            }
                        }

                        ?>

                    </div>
                </div>
                <div class="mb-3">
                    <label for="ref_employee_number" class="form-label">ชื่อพนักงาน</label>
                    <input type="text" class="form-control" name="ref_employee_number" value="<?php echo ($_SESSION['User']); ?> <?php ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="ref_pickup_material_status" class="form-label">สถานะ</label>
                    <input type="text" class="form-control" name="ref_pickup_material_status" value="รออนุมัติ" readonly>
                </div>
                <button type="submit" class="btn btn-success" name="save" onclick="submitData()">เพิ่มข้อมูล</button>
                <a type="button" class="btn btn-danger" href="pickup_material.php">ยกเลิก</a>
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