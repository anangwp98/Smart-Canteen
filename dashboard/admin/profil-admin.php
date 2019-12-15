
<?php
session_start();
if(isset($_SESSION['username'])) {
  include('header-profil.php'); 
  include('main-profil.php');
  include('footer-admin.php');
} else {
  header("location:../../dashboard/");
}
?>