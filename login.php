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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Form Login</title>
</head>

<body>
    <div class="container">
        <form class="login-form" action="" method="post">
            <h2>LOGIN</h2>
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">

            <button type="submit" name="login">Login</button>
        </form>
    </div>    
</body>

</html>