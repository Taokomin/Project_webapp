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

            Header("Location: admin_page.php");
        } else if ($_SESSION["Userlevel"] == "M") {

            Header("Location: user_page.php");
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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div class="login">
        <h1>เข้าสู่ระบบ</h1>
        <form action="" method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="ชื่อผู้ใช้" id="username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="รหัสผ่าน" id="password" required>
            <input type="submit" value="เข้าสู่ระบบ">
        </form>
    </div>
</body>

</html>