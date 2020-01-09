<?php 
session_start();    
if($_SESSION['level'] == 'admin') {
    header("location:../admin/");
} else if($_SESSION['level'] == 'user') {
    include('header-user.php');
    include('view-menu.php');
    include('view-topup.php');
    include('footer-user.php');
} else {
    session_destroy();
    include("location: ../login.php");
}
?>