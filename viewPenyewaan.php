<?php

require_once("config.php");
session_start();

$i = $_POST;

if(isset($i['delete'])):

   // Melakukan query ke database
   $idkendaraan = $i["id_kendaraan"];
   $deleteKendaraan = "DELETE FROM kendaraan WHERE id_kendaraan='$idkendaraan'";
   $result = $mysqli->query($deleteKendaraan);
 
    if($result):
        echo '<script language="javascript">';
        echo 'alert("Successfully Delete Data")';
        echo '</script>';
    else:
        echo '<script language="javascript">';
        echo 'alert("Failed Delete Data \n ERROR: Kendaraan Sedang disewa")';
        echo '</script>';
    endif;

endif;

if(isset($i['update'])):

    // Melakukan query ke database
    $idkendaraan = $i["id_kendaraan"];
    $jeniskendaraan = $i["jeniskendaraan"];
    $namakendaraan  = $i["namakendaraan"];
    $jumlah         = $i["jumlah"];

    $updateKendaraan = "UPDATE kendaraan SET jeniskendaraan='$jeniskendaraan', namakendaraan='$namakendaraan', jumlah='$jumlah' 
    WHERE id_kendaraan='$idkendaraan'";
    $result = $mysqli->query($updateKendaraan);

    if($result):
        echo '<script language="javascript">';
        echo 'alert("Successfully Update Data")';
        echo '</script>';
    else:
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        echo '<script language="javascript">';
        echo 'alert("Failed Update Data")';
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
    <title>Data Kendaraan</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center font-weight-bold">Data Kendaraan</h2>
    <a href="inputSewa.php" class="btn btn-success btn-block">Input Data Kendaraan</a>
    <a href="historySewaKendaraan.php" class="btn btn-primary btn-block">History Sewa Kendaraan</a>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <td>ID kendaraan</td>
                    <td>Jenis Kendaraan</td>
                    <td>Nama Kendaraan</td>
                    <td>Jumlah</td>
                    <td>Aksi</td>
                </tr>

                <?php
                    $getAllKendaraan = "SELECT * FROM kendaraan";
                    $result = $mysqli->query($getAllKendaraan);
                    if ($result->num_rows > 0){

                        while($row = $result->fetch_assoc()){?>
                            <tr>
                                <td><?= $row["id_kendaraan"] ?></td>
                                <td><?= $row["jeniskendaraan"] ?></td>
                                <td><?= $row["namakendaraan"] ?></td>
                                <td><?= $row["jumlah"] ?></td>
                                <td>
                                   <a href="#" class="btn btn-sm btn-danger action" data-toggle="modal" data-target="#modal-delete<?php echo $row['id_kendaraan']; ?>">Delete</a>
                                    <?php include "kendaraanDelete.php"; ?>

                                    <a href="#" class="btn-sm btn btn-primary action" data-toggle="modal" data-target="#modal-update<?php echo $row['id_kendaraan']; ?>">Update</a>
                                    <?php include "updateKendaraan.php"; ?>
                                </td>
                            </tr>
                        
                <?php }} ?>

            </table>    
            
        </div>
        <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
    </div>
</div>

</body>
</html>