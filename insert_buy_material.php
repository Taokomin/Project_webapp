<?php
include('condb.php');
if (!$con) mysqli_connect_errno();

$GLOBALS['maxIdLength'] = 3;
$GLOBALS['buy_material_number'] = '0';

$sql = "SELECT buy_material_id FROM tb_buy_material ORDER BY buy_material_id DESC LIMIT 1";
$query = $con->query($sql);
$result = $query->fetch_assoc();

if ($result['buy_material_id']) {
    $GLOBALS['buy_material_id'] = $result['buy_material_id'];
}

function increaseId($buy_material_id)
{
    $matchId = preg_replace('/[^0-9]/', '', $buy_material_id);
    $convertStringToInt = (int)$matchId;

    $concatIdWithString = (string)($convertStringToInt + 1);

    $round = 0;
    while ($round < $GLOBALS['maxIdLength'] - strlen($concatIdWithString)) {
        $concatIdWithString = '0' . $concatIdWithString;
        $round += 1;
    }

    return 'BM' . $concatIdWithString;
}
?>
<?php
$sql1 = $con = mysqli_connect("localhost", "root", "", "webdata") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$query1 = "SELECT * FROM tb_unit ORDER BY unit_number asc";
$result1 = mysqli_query($sql1, $query1);
$query2 = "SELECT * FROM tb_customer ORDER BY customer_number asc";
$result2 = mysqli_query($sql1, $query2);
$query3 = "SELECT * FROM tb_employee ORDER BY employee_number asc";
$result3 = mysqli_query($sql1, $query3);
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
        <title>เพิ่มข้อมูลการสั่งซื้อสินค้าจากลูกค้า</title>
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            <h1 class="mt-5">เพิ่มข้อมูลการสั่งซื้อสินค้าจากลูกค้า</h1>
            <hr>
            <form action="insert_buy_material_db.php" method="post">
                <div class="mb-3">
                    <label for="buy_material_id" class="form-label">รหัสสั่งซื้อวัสดุและอุปกรณ์</label>
                    <input type="text" class="form-control" name="buy_material_id" value="<?php echo (increaseId($GLOBALS['buy_material_id'])); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="buy_material_day" class="form-label">วั่นที่สั่งซื้อ</label>
                    <input type="date" class="form-control" name="buy_material_day" id="buy_material_day" value="<?php echo date('Y-m-d'); ?>" required>
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
                    <input type="text" class="form-control" name="buy_material_detail" required>
                </div>
                <label for="ref_unit_number" class="form-label">เลือกหน่วยนับ</label>
                <select class="form-select" aria-label="Default select example" name="ref_unit_number" required>
                    <option value="">-กรุณาเลือก-</option>
                    <?php foreach ($result1 as $results) { ?>
                        <option value="<?php echo $results["unit_number"]; ?>">
                            <?php echo $results["unit_name"]; ?>
                        </option>
                    <?php } ?>
                </select>
        </div>
        <div class="mb-3">
            <label for="buy_material_quantity">จำนวน</label>
            <input type="text" class="form-control" name="buy_material_quantity" required>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="ref_customer_number" class="form-label">เลือกชื่อลูกค้า</label>
                    <select class="form-select" aria-label="Default select example" name="ref_customer_number" required>
                        <option value="">-กรุณาเลือก-</option>
                        <?php foreach ($result2 as $results) { ?>
                            <option value="<?php echo $results["customer_number"]; ?>">
                                <?php echo $results["customer_fname"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ref_employee_number" class="form-label">ชื่อพนักงาน</label>
                    <input type="text" class="form-control" name="ref_employee_number" value="<?php echo ($_SESSION['User']); ?> <?php ?>" readonly>
                </div>
            </div>
            <button type="submit" name="save" class="btn btn-success">เพิ่มข้อมูล</button>
            <a type="button" class="btn btn-danger" href="customer_order.php">ยกเลิก</a>
            </form>
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