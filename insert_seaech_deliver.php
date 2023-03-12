<?php
include('condb.php');
if (!$con) mysqli_connect_errno();

$GLOBALS['maxIdLength'] = 3;
$GLOBALS['deliver_number'] = '0';

$sql = "SELECT deliver_id FROM tb_deliver ORDER BY deliver_id DESC LIMIT 1";
$query = $con->query($sql);
$result = $query->fetch_assoc();

if ($result['deliver_id']) {
    $GLOBALS['deliver_id'] = $result['deliver_id'];
}

function increaseId($deliver_id)
{
    $matchId = preg_replace('/[^0-9]/', '', $deliver_id);
    $convertStringToInt = (int)$matchId;

    $concatIdWithString = (string)($convertStringToInt + 1);

    $round = 0;
    while ($round < $GLOBALS['maxIdLength'] - strlen($concatIdWithString)) {
        $concatIdWithString = '0' . $concatIdWithString;
        $round += 1;
    }

    return 'DV' . $concatIdWithString;
}
?>
<?php
$sql1 = $con = mysqli_connect("localhost", "root", "", "webdata") or die("เกิดข้อผิดพลาดเกิดขึ้น");
$query1 = "SELECT * FROM tb_customer_order ORDER BY customer_order_number asc";
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
            <h1 class="mt-5">เพิ่มข้อมูลการส่งมอบสินค้า</h1>
            <hr>
            <form action="insert_deliver_db.php" method="post" >

                <div class="row">
                    <div class="mb-3">
                        <label for="customer_order_id" class="form-label">รหัสส่งมอบ</label>
                        <input type="text" class="form-control" name="deliver_id" value="<?php echo (increaseId($GLOBALS['deliver_id'])); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="deliver_day" class="form-label">วั่นที่ส่งมอบ</label>
                        <input type="date" class="form-control" name="deliver_day" id="deliver_day" value="<?php echo date('Y-m-d'); ?>" required>
                        <script type='text/javascript'>
                            var highlight_dates = ['1-5-2020', '11-5-2020', '18-5-2020', '28-5-2020'];

                            $(document).ready(function() {


                                $('#deliver_day').deliver_day({
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
                        <label for="searchInput" class="form-label">รหัส</label>
                        <select class="form-select" aria-label="Default select example" name="stud_customer_order_id" class="form-control" required>
                            <option value="<?php if (isset($_GET['stud_customer_order_id'])) {
                                                echo $_GET['stud_customer_order_id'];
                                            } ?>">-กรุณาเลือก-</option>
                            <?php foreach ($result1 as $results) { ?>
                                <option value="<?php echo $results["customer_order_id"]; ?>">
                                    <?php echo $results["customer_order_id"]; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" id="searchBtn">ค้นหา</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "webdata");

                        if (isset($_GET['stud_customer_order_id'])) {
                            $stud_customer_order_id = $_GET['stud_customer_order_id'];
                            $query = "
                                    SELECT co.*, u.unit_name, c.customer_fname
                                    FROM tb_customer_order AS co
                                    INNER JOIN tb_unit AS u ON co.ref_unit_number = u.unit_number
                                    INNER JOIN tb_customer AS c ON co.ref_customer_number = c.customer_number
                                    WHERE customer_order_id='$stud_customer_order_id'
                                    ORDER BY u.unit_number, c.customer_number ASC;
                                    ";

                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                        ?>
                                    <div class="mb-3">
                                        <label for="ref_customer_order_day" class="form-label">วันที่สั่ง</label>
                                        <input type="text" class="form-control" name="ref_customer_order_day" value="<?= $row['customer_order_day']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_customer_order_detail" class="form-label">สินค้าที่สั่งทำ</label>
                                        <input type="text" class="form-control" name="ref_customer_order_day" value="<?= $row['customer_order_detail']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_customer_order_quantity" class="form-label">จำนวน</label>
                                        <input type="text" class="form-control" name="ref_customer_order_quantity" value="<?= $row['customer_order_quantity']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_unit_name" class="form-label">หน่วยนับ</label>
                                        <input type="text" class="form-control" name="ref_unit_name" value="<?= $row['unit_name']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_customer_fname" class="form-label">ลูกค้า</label>
                                        <input type="text" class="form-control" name="ref_customer_fname" value="<?= $row['customer_fname']; ?>" readonly>
                                    </div>
                        <?php
                                }
                            } else {
                                echo "No Record Found";
                            }
                        }

                        ?>

                    </div>
                </div>
                <div class="mb-3">
                    <label for="ref_employee_number" class="form-label">ชื่อพนักงาน</label>
                    <input type="text" class="form-control" name="ref_employee_number" value="<?php echo ($_SESSION['User']); ?> <?php ?>" readonly>
                </div>

                <button type="submit" class="btn btn-success" name="save">เพิ่มข้อมูล</button>
                <a type="button" class="btn btn-danger" href="deliver.php">ยกเลิก</a>
            </form>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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