<?php 
include('../koneksi.php');
$id_barang = $_GET['id'];
$query = "DELETE FROM barang WHERE id_barang='$id_barang'";
if(mysqli_query($koneksi, $query)) {
    header("location:./index.php");
} else {
    echo"<script language='javascript'> alert('Data Gagal Dihapus!');history.go(-1); </script>";
}
?>