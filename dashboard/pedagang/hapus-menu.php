<?php 
include('../koneksi.php');
$id = $_GET['id'];
$query = "DELETE FROM menu WHERE id_menu='$id'";
if(mysqli_query($koneksi, $query)) {
    header("location:./view-menu.php");
} else {
    echo"<script language='javascript'> alert('Data Gagal Dihapus!');history.go(-1); </script>";
}
?>