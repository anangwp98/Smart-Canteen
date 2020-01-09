<?php 
include ('../koneksi.php');
session_start();
if(isset($_POST['update'])){
    $id             = $_SESSION['id_user'];
    $nama           = $_POST['nama'];
    $email          = $_POST['email'];
    $jk             = $_POST['jenkel'];
    $tglLahir       = $_POST['tglLahir'];
    $alamat         = $_POST['alamat'];
    $telepon         = $_POST['telepon'];
    $sqlDate        = date('Y-m-d', strtotime($tglLahir));

    $query = "UPDATE `user` SET `nama`='$nama', `email`='$email',  `jk`='$jk', `alamat`='$alamat', `tgl_lahir`='$sqlDate',`telepon`='$telepon' WHERE `user`.`id_user`='$id'";
    if(mysqli_query($koneksi, $query)) {
        header("location: view-profil.php");
    } else {
        echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
    }
} else {
    echo "ERROR";
}