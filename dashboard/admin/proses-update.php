<?php 
include ('../koneksi.php');
session_start();
if(isset($_POST['update'])){
    $id           = $_SESSION['id_user'];
    $nama           = $_POST['nama'];
    $email          = $_POST['email'];
    $jk             = $_POST['jenkel'];
    $tglLahir       = $_POST['tglLahir'];
    $alamat         = $_POST['alamat'];
    
    $sqlDate        = date('Y-m-d', strtotime($tglLahir));
    $query = "UPDATE `user` SET `nama`='$nama', `email`='$email',  `jk`='$jk', `tgl_lahir`='$sqlDate', `alamat`='$alamat' WHERE `user`.`id_user`='$id'";
    if(mysqli_query($koneksi, $query)) {
        header("location: profil-admin.php");
    } else {
        echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
    }
} else {
    echo "<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";
}
?>