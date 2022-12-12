<?php 

    include_once('functions.php');

    if (isset($_GET['delunit'])) {
        $id = $_GET['delunit'];
        $deletedata = new DB_con();
        $sql = $deletedata->deleteunit($id);

        if ($sql) {
            echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว!');</script>";
            echo "<script>window.location.href='unit.php'</script>";
        }
    }
    ?>