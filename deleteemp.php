<?php 

    include_once('functions.php');

    if (isset($_GET['delemp'])) {
        $idemp = $_GET['delemp'];
        $deletedata = new DB_con();
        $sql = $deletedata->deleteemp($idemp);

        if ($sql) {
            echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว!');</script>";
            echo "<script>window.location.href='employee.php'</script>";
        }
    }

?>