<?php
session_start();
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_pedagang'])){
	header("location:./../index.php");
} else {
    include('header-pedagang.php');
    include('data-menu.php');
    include('footer-pedagang.php');
}
?>