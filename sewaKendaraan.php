<?php 
  require_once("config.php");
  session_start();

  $idkendaraan = $_GET["idkendaraan"];
  $username    = $_SESSION["username"];
  
  // lakukan query untuk menyimpan data ke dalam tabel sewa di database
  $insertSewa = "INSERT INTO sewa(username,id_kendaraan) VALUES ('$username','$idkendaraan')";
  $result     = $mysqli->query($insertSewa);

  // redirect ke halaman listKendaraan
  if($result){
    echo '<script type="text/javascript"> ';
    echo '  alert("Berhasil Sewa Kendaraan");';
    echo ' window.location.href = "listKendaraan.php";';
    echo '</script>';
  }
  else die("Gagal Sewa!");
?>