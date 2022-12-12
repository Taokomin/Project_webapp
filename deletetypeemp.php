<?php 

    include_once('functions.php');

    if (isset($_GET['deltpemp'])) {
        $id = $_GET['deltpemp'];
        $deletedata = new DB_con();
        $sql = $deletedata->deletetpemp($id);

        if ($sql) {
            echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว!');</script>";
            echo "<script>window.location.href='typeemp.php'</script>";
        }
    }
    ?>