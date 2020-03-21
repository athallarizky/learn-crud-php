<?php 
    session_start();

    // Hapus semua session & Redirect ke index
    session_destroy();
    header("Location: index.php");
?>