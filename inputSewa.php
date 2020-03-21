<?php
    require_once("config.php");
    session_start();
    
    $username = $_SESSION["username"];
    $role     = $_SESSION["role"];

    if(!isset($username) OR ($role!=1)) header("Location: index.php");

    $i = $_POST;

    if(isset($i["daftar"])):
        $jeniskendaraan = $i["jeniskendaraan"];
        $namakendaraan  = $i["namakendaraan"];
        $jumlah         = $i["jumlah"];

        $insertKendaraan = "INSERT INTO kendaraan(jeniskendaraan, namakendaraan, jumlah) VALUES('$jeniskendaraan', '$namakendaraan', '$jumlah')";
        $result = $mysqli->query($insertKendaraan);

        if($result):
            echo '<script type="text/javascript"> ';
            echo '  alert("Berhasil Tambah Kendaraan");';
            echo ' window.location.href = "listKendaraan.php";';
            echo '</script>';
        endif;
    endif;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Admin</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>

<div class="container mt-5">
    <h2 class=" font-weight-bold">Input Data Sewa</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">

        <form action="" method="POST">

            <div class="form-group">
                <label for="jeniskendaraan">Jenis Kendaraan</label>
                <input class="form-control" type="text" name="jeniskendaraan" placeholder="jeniskendaraan" required/>
            </div>
            <div class="form-group">
                <label for="namakendaraan">Nama Kendaraan</label>
                <input class="form-control" type="text" name="namakendaraan" placeholder="Nama Kendaraan" required/>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input class="form-control" type="number" name="jumlah" placeholder="Jumlah kendaraan" required/>
            </div>

            <input type="submit" class="btn btn-primary btn-block" name="daftar" value="Daftar" required/>

        </form>
        <a href="viewPenyewaan.php" class="btn btn-warning mx-auto d-block" style="width:100px; margin-top: 20px;"> Kembali </a>  
        </div>

    </div>
</div>

</body>
</html>