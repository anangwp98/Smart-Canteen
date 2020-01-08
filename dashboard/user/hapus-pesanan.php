<?php 
include('../koneksi.php');
$id = $_GET['id'];
$query = "DELETE FROM pemasanan WHERE no_invoce='$id'";
if(mysqli_query($koneksi, $query)) {
    header("location:./view-pesanan.php");
} else {
    echo"<script language='javascript'> alert('Data Gagal Dihapus!');history.go(-1); </script>";
}
?>