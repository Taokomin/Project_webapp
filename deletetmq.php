<?php 

    include_once('functions.php');

    if (isset($_GET['deltmq'])) {
        $id = $_GET['deltmq'];
        $deletedata = new DB_con();
        $sql = $deletedata->deletetmq($id);

        if ($sql) {
            echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว!');</script>";
            echo "<script>window.location.href='typemandq.php'</script>";
        }
    }
    ?>