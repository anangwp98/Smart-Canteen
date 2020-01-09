<?php 
include ('../koneksi.php');
session_start();
if(isset($_POST['update'])){
    $id             = $_POST['id'];
    $nama           = $_POST['nama'];
    $email          = $_POST['email'];
    $jk             = $_POST['jenkel'];
    $tglLahir       = $_POST['tglLahir'];
    $alamat         = $_POST['alamat'];
    $sqlDate        = date('Y-m-d', strtotime($tglLahir));
    $query = "UPDATE `users` SET `nama`='$nama', `email`='$email',  `jk`='$jk', `tglLahir`='$sqlDate', `alamat`='$alamat' WHERE `users`.`id`='$id'";
    if(mysqli_query($koneksi, $query)) {
        header("location: view-profil.php");
    } else {
        echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
    }
} else {
    echo "ERROR";
}