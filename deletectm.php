<?php 

    include_once('functions.php');

    if (isset($_GET['delctm'])) {
        $idctm = $_GET['delctm'];
        $deletedata = new DB_con();
        $sql = $deletedata->deletectm($idctm);

        if ($sql) {
            echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว!');</script>";
            echo "<script>window.location.href='customer.php'</script>";
        }
    }

?>