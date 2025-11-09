<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];

        if ($user['level'] === 'admin') {
            header ("Location: halaman_admin.php");
        }else if ($user['level'] === 'user') {
            header ("Location: halaman_user.php");
        } else {
            echo "Username atau password salah!";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form Login</title>
</head>

<body>
    <div class="container">
        <form class="login-form" action="login1.php" method="post">
            <h2>LOGIN</h2>
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">

            <button type="submit" name="login">Login</button>
        </form>
    </div>    
</body>

</html>