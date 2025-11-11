<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] != 'user'){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Selamat datang, <span class="p"><?= $_SESSION['username']; ?></span></h1>
    <p>Ini adalah halaman dashboard khusus untuk user.</p>
    <a href="logout.php">Logout</a>
    
</body>
</html>