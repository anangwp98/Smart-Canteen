<?php
session_start();
if($_SESSION['level'] == 'user') {
  header("location:../user/");
} else {
  include('header-admin.php');
  include('data-update-topup.php');
  include('footer-admin.php');
}
  
?>