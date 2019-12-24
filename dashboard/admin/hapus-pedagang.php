<?php 
include('../koneksi.php');
$id_barang = $_GET['id_pedagang'];
$query = "DELETE FROM pedagang WHERE id_pedagang='$id_barang'";
if(mysqli_query($koneksi, $query)) {
    header("location:./view-pedagang.php");
} else {
    echo"<script language='javascript'> alert('Data Gagal Dihapus!');history.go(-1); </script>";
}
?>