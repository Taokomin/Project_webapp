<?php session_start(); ?>
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
        <form action="login_db.php" name="frmlogin" method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="Username" placeholder="ชื่อผู้ใช้" id="Username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="Password" placeholder="รหัสผ่าน" id="Username" required>
            <input type="submit" value="เข้าสู่ระบบ">
        </form>
    </div>
</body>

</html>