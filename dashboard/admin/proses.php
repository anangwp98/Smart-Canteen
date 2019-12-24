<?php
include('../koneksi.php');
session_start();
if(isset($_POST['simpan_user'])) {
    $username           = $_POST['username'];
    $nama               = $_POST['nama'];
    $password           = md5($_POST['password']);
    $email              = $_POST['email'];
    $tglLahir           = $_POST['tglLahir'];
    $jk                 = $_POST['jenkel'];
    $alamat             = $_POST['alamat'];
    $telp               = $_POST['telp'];
    $level              = $_POST['level'];
    
    $low_username = strtolower($username);

    $new_auto_increment=$low_username; 
    
    $date = date('dmY-Hi');
    $id="FN".$new_auto_increment.$date;
    $query="INSERT INTO `users` (`id`, `username`, `nama`, `email`, `password`, `tglLahir`, `jk`, `alamat`, `nomorTelp`, `level`) VALUES ('$id', '$low_username', '$nama', '$email', '$password', '$tglLahir', '$jk', '$alamat', '$telp', '$level')";
    if(mysqli_query($koneksi, $query)) {
        header("location:./index.php");
    } else {
        echo"<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";
    }
} else if(isset($_POST['simpan_pedagang'])) {
    $nama               = $_POST['nama'];
    $password           = $_POST['password'];
    $email              = $_POST['email'];
    $jenkel             = $_POST['jenkel'];
    $alamat             = $_POST['alamat'];
    $telepon            = $_POST['telp'];
    $id_admin           = $_SESSION['id_user'];
    $id_nama = str_replace(' ', '-', $nama);
    $id_increment = rand(); 
    $id="PDG-".$id_increment.$id_nama;
    $query="INSERT INTO `pedagang` (`id_pedagang`, `nama`, `password`, `email`, `jk`, `telepon`, `alamat`, `id_admin`) VALUES ('$id', '$nama', '$password','$email','$jenkel','$telepon','$alamat','$id_admin')";
    if(mysqli_query($koneksi, $query)) {
        header("location:./view-pedagang.php");
    } else {
        echo"<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";
    }
} else {
    echo "<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";
}
?>