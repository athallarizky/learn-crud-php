<?php

    require_once("config.php");
    session_start();

    if(!isset($_SESSION["username"])) header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History Penyewaan Kendaraan</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center font-weight-bold">Data Kendaraan</h2>
    <div class="row">
        <div class="col-md-12">
        
            <table class="table table-striped">
            <!-- Tampilan untuk user: Mengambil history sewa sesuai user yang sedang login -->
            <?php 
                $username = $_SESSION["username"];
                $historySewa = "SELECT * FROM sewa WHERE username='$username' ";
                $result = $mysqli->query($historySewa);
            ?>
                
        <?php if($result->num_rows > 0): ?>
            <?php  if($_SESSION['role']==0): ?>
                    <tr class="font-weight-bold">
                        <td>ID kendaraan</td>
                        <td>Jenis Kendaraan</td>
                        <td>Nama Kendaraan</td>
                    </tr>
                    <?php 
                        while($row = $result->fetch_assoc()): 
                            $getKendaraanQuery = "SELECT * FROM kendaraan WHERE id_kendaraan='" . $row['id_kendaraan'] . "'";
                            $datas = $mysqli->query($getKendaraanQuery);
                            
                            if($datas->num_rows > 0):
                                while($data = $datas->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?= $data["id_kendaraan"] ?></td>
                        <td><?= $data["jeniskendaraan"] ?></td>
                        <td><?= $data["namakendaraan"] ?></td>
                    </tr>
                            <?php endwhile; ?>
                        <?php endif;?>
                    <?php endwhile; ?>

            <?php endif; ?>
        <?php endif; ?>

        <!-- Tampilan untuk admin: Mengambil SEMUA history sewa -->
            <?php 
                $historySewa = "SELECT * FROM sewa";
                $result = $mysqli->query($historySewa);
            ?>
            <?php if($result->num_rows > 0): ?>
                <?php if($_SESSION['role']==1): ?>
                        <tr class="font-weight-bold">
                            <td>ID kendaraan</td>
                            <td>Jenis Kendaraan</td>
                            <td>Nama Kendaraan</td>
                            <td>Username Penyewa</td>
                        </tr>

                        <?php while($row = $result->fetch_assoc()): ?>
                            <?php 
                                $getKendaraanQuery = "SELECT * FROM kendaraan WHERE id_kendaraan='" . $row['id_kendaraan'] . "'";
                                $datas = $mysqli->query($getKendaraanQuery);

                                if($datas->num_rows > 0):
                                    while($data = $datas->fetch_assoc()):
                            ?>
                        <tr>
                            <td><?= $data["id_kendaraan"]?></td>
                            <td><?= $data["jeniskendaraan"]?></td>
                            <td><?= $data["namakendaraan"]?></td>
                            <td><?= $row["username"]?></td>
                        </tr>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>

                <?php endif; ?>
            <?php endif; ?>
            </table>    
        </div>

    </div>
    
    <?php if($_SESSION['role']==0): ?>
        <a href="listKendaraan.php" class="btn btn-warning mx-auto d-block" style="width:100px;"> Kembali </a>
    <?php elseif($_SESSION['role']==1): ?>
        <a href="viewPenyewaan.php" class="btn btn-warning mx-auto d-block" style="width:100px;"> Kembali </a>
    <?php endif; ?>
    
</div>

</body>
</html>

