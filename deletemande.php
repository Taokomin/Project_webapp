<?php 

    include_once('functions.php');

    if (isset($_GET['delmande'])) {
        $idmande = $_GET['delmande'];
        $deletedata = new DB_con();
        $sql = $deletedata->deletemande($idmande);

        if ($sql) {
            echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว!');</script>";
            echo "<script>window.location.href='mande.php'</script>";
        }
    }

?>