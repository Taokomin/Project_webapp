<?php
include('condb.php');
if (!$con) mysqli_connect_errno();

$GLOBALS['maxIdLength'] = 3;
$GLOBALS['accept_material_number'] = '0';

$sql = "SELECT accept_material_id FROM tb_accept_material ORDER BY accept_material_id DESC LIMIT 1";
$query = $con->query($sql);
$result = $query->fetch_assoc();

if ($result['accept_material_id']) {
    $GLOBALS['accept_material_id'] = $result['accept_material_id'];
}

function increaseId($accept_material_id)
{
    $matchId = preg_replace('/[^0-9]/', '', $accept_material_id);
    $convertStringToInt = (int)$matchId;

    $concatIdWithString = (string)($convertStringToInt + 1);

    $round = 0;
    while ($round < $GLOBALS['maxIdLength'] - strlen($concatIdWithString)) {
        $concatIdWithString = '0' . $concatIdWithString;
        $round += 1;
    }

    return 'AM' . $concatIdWithString;
}
?>
<?php
$sql1 = $con = mysqli_connect("localhost", "root", "", "webdata") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$query1 = "SELECT * FROM tb_buy_material ORDER BY buy_material_number asc";
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
        <title>เพิ่มข้อมูลการรับเข้าวัสดุและอุปกรณ์</title>
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            <h1 class="mt-5">เพิ่มข้อมูลการรับเข้าวัสดุและอุปกรณ์</h1>
            <hr>
            <form id="myForm" method="GET">


                <div class="mb-3">
                    <label for="accept_material_id" class="form-label">รหัสรับเข้า</label>
                    <input type="text" class="form-control" name="accept_material_id" value="<?php echo (increaseId($GLOBALS['accept_material_id'])); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="accept_material_day" class="form-label">วันที่รับเข้า</label>
                    <input type="date" class="form-control" name="accept_material_day" id="accept_material_day" value="<?php echo date('Y-m-d'); ?>" required>
                    <script type='text/javascript'>
                        var highlight_dates = ['1-5-2020', '11-5-2020', '18-5-2020', '28-5-2020'];

                        $(document).ready(function() {


                            $('#accept_material_day').accept_material_day({
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
                    <label for="searchInput" class="form-label">รหัสการรับเข้าวัสดุและอุปกรณ์</label>
                    <select class="form-select" aria-label="Default select example" name="ref_buy_material_id" required>
                        <option value="<?php if (isset($_GET['ref_buy_material_id'])) {
                                            echo $_GET['ref_buy_material_id'];
                                        } ?>">-กรุณาเลือก-</option>
                        <?php foreach ($result1 as $results) { ?>
                            <option value="<?php echo $results["buy_material_id"]; ?>">
                                <?php echo $results["buy_material_id"]; ?>
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
                        document.getElementById("myForm").action = "insert_accept_material_db.php";
                        document.getElementById("myForm").method = "GET";
                        document.getElementById("myForm").submit();
                    }
                </script>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "webdata");
                        if (isset($_GET['ref_buy_material_id'])) {
                            $ref_buy_material_id = $_GET['ref_buy_material_id'];
                            $query = "SELECT bm.*,e.equipment_name, u.unit_name, et.equipment_type_name , p.partners_fname
                                      FROM tb_buy_material as bm
                                      INNER JOIN tb_equipment as e ON bm.ref_equipment_number = e.equipment_number
                                      INNER JOIN tb_unit as u ON bm.ref_unit_number = u.unit_number
                                      INNER JOIN tb_equipment_type as et ON bm.ref_equipment_type = et.equipment_type_number
                                      INNER JOIN tb_partners as p ON bm.ref_partners_number = p.partners_number
                                      WHERE buy_material_id='$ref_buy_material_id'
                                      ORDER BY e.equipment_number, u.unit_number, et.equipment_type_number ,p.partners_number ASC;
                                      ";

                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                        ?>
                                    <div class="mb-3">
                                        <label for="ref_customer_order_day" class="form-label">วั่นที่สั่งซื้อ</label>
                                        <input type="text" class="form-control" name="ref_buy_material_day" value="<?= $row['buy_material_day']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_buy_material_detail" class="form-label">รายละเอียดการสั่งซื้อวัสดุและอุปกรณ์</label>
                                        <input type="text" class="form-control" name="ref_buy_material_detail" value="<?= $row['buy_material_detail']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_equipment_number" class="form-label">วัสดุและอุปกรณ์</label>
                                        <input type="text" class="form-control" name="ref_equipment_number" value="<?= $row['equipment_name']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_buy_material_quantity" class="form-label">จำนวน </label>
                                        <input type="text" class="form-control" name="ref_buy_material_quantity" value="<?= $row['buy_material_quantity']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_unit_number" class="form-label">หน่วยนับ</label>
                                        <input type="text" class="form-control" name="ref_unit_number" value="<?= $row['unit_name']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_equipment_type" class="form-label">ประเภทวัสดุและอุปกรณ์</label>
                                        <input type="text" class="form-control" name="ref_equipment_type" value="<?= $row['equipment_type_name']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_partners_number" class="form-label">คู่ค้า</label>
                                        <input type="text" class="form-control" name="ref_partners_number" value="<?= $row['partners_fname']; ?>" readonly>
                                    </div>
                        <?php
                                }
                            } else {
                                echo "ไม่พบบันทึก";
                                echo $ref_buy_material_id;
                            }
                        }

                        ?>

                    </div>
                </div>
                <div class="mb-3">
                    <label for="ref_employee_number" class="form-label">ชื่อพนักงาน</label>
                    <input type="text" class="form-control" name="ref_employee_number" value="<?php echo ($_SESSION['User']); ?> <?php ?>" readonly>
                </div>

                <button type="submit" class="btn btn-success" name="save" onclick="submitData()">เพิ่มข้อมูล</button>
                <a type="button" class="btn btn-danger" href="accept_material.php">ยกเลิก</a>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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