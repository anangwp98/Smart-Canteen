<?php 
session_start();    
if ($_SESSION['level'] == 'user') {
    header("location:../user/");
} else if($_SESSION['level'] == 'admin') {
    include('header-admin.php');
    include('data-pedagang.php');
    include('footer-admin.php');
} else {
    session_destroy();
    include("location: ../login.php");
}
?>