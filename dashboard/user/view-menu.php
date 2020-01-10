<?php
// cek apakah yang mengakses halaman ini sudah login
session_start();
if(!isset($_SESSION['id_user'])){
	header("location:./../index.php");
} else if($_SESSION['level'] == 'admin') {
    header("location:../admin/");
} else {
    include('header-user.php');
    include('data-menu.php');
    include('footer-user.php');
}
?>