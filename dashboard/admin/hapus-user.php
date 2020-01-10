<?php 
include('../koneksi.php');
$id_user = $_GET['id'];
$query = "DELETE FROM user WHERE id_user='$id_user'";
if(mysqli_query($koneksi, $query)) {
    header("location:./view-user.php");
} else {
    echo"<script language='javascript'> alert('Data Gagal Dihapus!');history.go(-1); </script>";
}
?>