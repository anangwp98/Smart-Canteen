<?php
include('../koneksi.php');
session_start();
if(isset($_POST['create_dompet'])) {
    $id_user        = $_SESSION['id_user'];
    $saldo = 0;
    $new_auto_increment = rand();
    $id="DP".$new_auto_increment;
    $query="INSERT INTO `dompet` (`id_dompet`, `saldo`, `id_user`) VALUES ('$id', '$saldo', '$id_user');";
    if(mysqli_query($koneksi, $query)) {
        header("location:./index.php");
    } else {
        echo"<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";
    }
}
?>