<?php
include('../koneksi.php');
session_start();
if(isset($_POST['simpan_pesanan'])) {
    $id_increment   = rand(); 
    $id_pesanan     = "PS-".$id_increment;
    $id_user        = $_SESSION['id_user'];
    $id_menu        = $_POST['id_menu'];

    $qty            = $_POST['jml_pesan'];
    $harga          = $_POST['harga'];

    $total = $qty * $harga;
    $date           = date('Y-m-d');
    echo $id_menu." - ".$qty." - ".$id_user." - ".$harga." - ".$id_pesanan." - ".$date;
    // $query="INSERT INTO `pemasanan` (`no_invoce`, `jml_pesan`, `tgl_pesan`, `total_bayar`, `id_menu`, `id_user`) VALUES ('$id_pesanan', '$qty', '$date', '$total', '$id_menu', '$id_user');";
    // if(mysqli_query($koneksi, $query)) {
    //     header("location:./view-pesanan.php");
    // } else {
    //     echo"<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";
    // }
} 