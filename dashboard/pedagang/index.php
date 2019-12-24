<?php 
session_start();
if(isset($_SESSION['id_pedagang'])){
    if($_SESSION['level'] == 'admin') {
        header("location:../admin/");
    } else if($_SESSION['level'] == 'user') {
        header("location:../user/");
    } else if($_SESSION['level'] == 'pedagang') {
        include('header-pedagang.php');
        include('view-menu.php');
        include('footer-pedagang.php');
    } else {
        session_destroy();
        header("location: ../login.php");
    }  
} else {
    header("location: ./login.php");
}

?>