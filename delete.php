<?php 

    include_once('functions.php');

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $deletedata = new DB_con();
        $sql = $deletedata->delete($id);

        if ($sql) {
            echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว!');</script>";
            echo "<script>window.location.href='prefix.php'</script>";
        }
    }

?>