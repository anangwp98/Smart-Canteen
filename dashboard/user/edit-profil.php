
<?php
session_start();
if($_SESSION['level'] == 'admin') {
  header("location:../admin/");
} else {
  include('header-user.php'); 
  include('form-edit-profil.php');
  include('footer-user.php');
}
  
?>