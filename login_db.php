<?php
session_start();
if (isset($_POST['Username'])) {
    include("condb.php");
    $Username = $_POST['Username'];
    $Password = md5($_POST['Password']);

    $sql = "SELECT * FROM User WHERE Username='" . $Username . "' AND Password='" . $Password . "' ";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION["UserID"] = $row["ID"];
        $_SESSION["User"] = $row["Firstname"] . " " . $row["Lastname"];
        $_SESSION["Userlevel"] = $row["Userlevel"];

        if ($_SESSION["Userlevel"] == "A") {

            Header("Location: admin.php");
        } else if ($_SESSION["Userlevel"] == "M") {

            Header("Location: index.php");
        } else {
            echo "<script>";
            echo "alert(\" Username หรือ  Password ไม่ถูกต้อง\");";
            echo "window.history.back()";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert(\" Username หรือ  Password ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }
} else {
    Header("Location: login.php");
}
?>