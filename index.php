<?php

require_once("config.php");
session_start();

if(isset($_SESSION['username'])):
    ($_SESSION["role"] == 0) ? header("Location: listKendaraan.php") : header("Location: viewPenyewaan.php");
endif;

$i = $_POST;
if(isset($i['login'])):
    $username = $i["username"];
    $password = $i["password"];

    // Cek apakah user sudah terdaftar atau belum
    $loginQuery = "SELECT username FROM user WHERE username='$username' && password='$password'";
    $result = $mysqli->query($loginQuery);

    // Kondisi ketika user telah terdaftar
    if($result->num_rows > 0):
        
        // Melakukan pengecekan status user, apakah (admin) atau (user)
        $checkRole = "SELECT role FROM user WHERE username='$username'";
        $result = $mysqli->query($checkRole);

        // Lakukan fetch data
        $row = $result->fetch_assoc();

        // Lakukan penyimpanan username dan role kedalam session
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row["role"];

        // (user)  : redirect ke list kendaraan
        // (admin) : redirect ke view penyewaan
        ($row["role"] == 0) ? header("Location: listKendaraan.php") : header("Location: viewPenyewaan.php");

    else: header("Location: index.php");
    endif;

    mysqli_close($mysqli);
endif;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>

<div class="container mt-5">
    <h2 class="font-weight-bold">Login</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">

        <form action="" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="username" required/>
            </div>
            <div class="form-group">
                <label for="namakendaraan">Password</label>
                <input class="form-control" type="Password" name="password" placeholder="Password" required/>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="login" value="Login" required/>

        </form>
            
        </div>

    </div>
</div>

</body>
</html>