<?php
session_start();
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user'])){
	header("location:./../index.php");
} else {
    include('header-user.php');
    include('data-menu.php');
    include('footer-user.php');
}
?>