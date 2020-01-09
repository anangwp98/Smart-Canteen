<?php 
include('../koneksi.php');
$id = $_GET['id'];
$query = "DELETE FROM topup WHERE id_topup='$id'";
if(mysqli_query($koneksi, $query)) {
    header("location: ./index.php");
} else {
    echo"<script language='javascript'> alert('Data Gagal Dihapus!');history.go(-1); </script>";
}
?>