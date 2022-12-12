<?php 

    include_once('functions.php');

    if (isset($_GET['delptn'])) {
        $idptn = $_GET['delptn'];
        $deletedata = new DB_con();
        $sql = $deletedata->deleteptn($idptn);

        if ($sql) {
            echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว!');</script>";
            echo "<script>window.location.href='partner.php'</script>";
        }
    }

?>