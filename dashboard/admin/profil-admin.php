
<?php
session_start();
if(isset($_SESSION['id_user'])) {
  include('header-profil.php'); 
  include('main-profil.php');
  include('footer-admin.php');
} else {
  header("location:../../dashboard/");
}
?>