<?php
require('condb.php');
$deliver_number = $_GET["deliver_number"];
$sql = "SELECT * FROM tb_deliver WHERE deliver_number = '$deliver_number'";
$result = mysqli_query($con, $sql);
$values = mysqli_fetch_assoc($result);
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลการส่งมอบสินค้า</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="mt-5">แก้ไขข้อมูลการส่งมอบสินค้า</h1>
        <hr>
        <form action="insert_deliver_db.php" method="post">
            <input type="hidden" value="<?php echo $values["deliver_number"]; ?>" name="deliver_number">
            <div class="mb-3">
                <label for="deliver_id" class="form-label">รหัสส่งมอบ</label>
                <input type="text" class="form-control" name="deliver_id" value="<?php echo $values['deliver_id']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="deliver_day" class="form-label">วั่นที่ส่งมอบ</label>
                <input type="date" class="form-control" name="deliver_day" id="deliver_day" value="<?php echo $values['deliver_day']; ?>" required>
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
                <label for="ref_customer_order_day" class="form-label">วันที่สั่ง</label>
                <input type="text" class="form-control" name="ref_customer_order_day" value="<?php echo $values['ref_customer_order_day']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="ref_customer_order_detail" class="form-label">สินค้าที่สั่งทำ</label>
                <input type="text" class="form-control" name="ref_customer_order_detail" value="<?php echo $values['ref_customer_order_detail']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="ref_customer_order_quantity" class="form-label">จำนวน</label>
                <input type="text" class="form-control" name="ref_customer_order_quantity" value="<?php echo $values['ref_customer_order_quantity']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="ref_unit_name" class="form-label">หน่วยนับ</label>
                <input type="text" class="form-control" name="ref_unit_name" value="<?php echo $values['ref_unit_name']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="ref_customer_fname" class="form-label">ลูกค้า</label>
                <input type="text" class="form-control" name="ref_customer_fname" value="<?php echo $values['ref_customer_fname']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="deliver_address" class="form-label">ที่อยู่ที่ส่งมอบ</label>
                <input type="text" class="form-control" name="deliver_address" value="<?php echo $values['deliver_address']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ref_employee_number" class="form-label">ชื่อพนักงาน</label>
                <input type="text" class="form-control" name="ref_employee_number" value="<?php echo $values['ref_employee_number']; ?>" readonly>
            </div>
            <button type="submit" name="save" class="btn btn-success">แก้ไขข้อมูล</button>
            <a type="button" class="btn btn-danger" href="deliver.php">ยกเลิก</a>
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