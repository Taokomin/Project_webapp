<?php
include('condb.php');
if (!$con) mysqli_connect_errno();

$GLOBALS['maxIdLength'] = 3;
$GLOBALS['unit_number'] = '0';

$sql = "SELECT unit_id FROM tb_unit ORDER BY unit_id DESC LIMIT 1";
$query = $con->query($sql);
$result = $query->fetch_assoc();


if ($result['unit_id']) {
    $GLOBALS['unit_id'] = $result['unit_id'];
}

function increaseId($unit_id)
{
    $matchId = preg_replace('/[^0-9]/', '', $unit_id);
    $convertStringToInt = (int)$matchId;

    $concatIdWithString = (string)($convertStringToInt + 1);

    $round = 0;
    while ($round < $GLOBALS['maxIdLength'] - strlen($concatIdWithString)) {
        $concatIdWithString = '0' . $concatIdWithString;
        $round += 1;
    }

    return 'UN' . $concatIdWithString;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>เพิ่มข้อมูลคำนำหน้าชื่อ</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">เพิ่มข้อมูลคำนำหน้าชื่อ</h1>
        <hr>

        <form action="insert_unit_db.php" method="post">
            <div class="mb-3">
                <label for="unit_id" class="form-label">รหัสคำนำหน้าชื่อ</label>
                <input type="text" class="form-control" name="unit_id" value="<?php echo (increaseId($GLOBALS['unit_id'])); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="prefix_name" class="form-label">คำนำหน้าชื่อ</label>
                <input type="text" class="form-control" name="unit_name" required>
            </div>
            <button type="submit" name="save" class="btn btn-success">เพิ่มข้อมูล </button>
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