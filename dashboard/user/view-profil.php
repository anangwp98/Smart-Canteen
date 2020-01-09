
<?php
session_start();
if(isset($_SESSION['id_user'])) {
  include('header-user.php'); 
  include('main-profil.php');
  include('footer-user.php');
} else {
  header("location:../../dashboard/");
}
?>