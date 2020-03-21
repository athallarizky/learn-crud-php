<?php
    require_once("config.php");
    session_start();

    
    // Pengecekan apakah user sudah login atau belum
    $username = $_SESSION["username"];
    $role     = $_SESSION["role"];
    if(!isset($username) OR ($role!=0)) header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Kendaraan</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
<h2 class="text-center font-weight-bold">List Kendaraan</h2>
    <a href="historySewaKendaraan.php" class="btn btn-primary btn-block">History Sewa Kendaraan</a>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <td>ID kendaraan</td>
                    <td>Jenis Kendaraan</td>
                    <td>Nama Kendaraan</td>
                    <td>Aksi</td>
                </tr>

                <?php
                    // Mengambil seluruh data dari table kendaraan
                    $dataKendaraanQuery = "SELECT * FROM kendaraan";
                    $result = $mysqli->query($dataKendaraanQuery);

                    // Pengecekan apakah data ada (data > 0)
                    if ($result->num_rows > 0):

                        // Melakukan fetching data dengan perulangan
                        while($row = $result -> fetch_assoc()):?>
                            <tr>
                                <td><?= $row["id_kendaraan"] ?></td>
                                <td><?= $row["jeniskendaraan"] ?></td>
                                <td><?= $row["namakendaraan"] ?></td>
                                <td>
                                    <a href="sewaKendaraan.php?idkendaraan=<?=$row["id_kendaraan"]?>" class="btn btn-sm btn-success action">Sewa</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
            </table>    
        </div>
    </div>
    <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
</div>

</body>
</html>