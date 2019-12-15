
<?php
session_start();
if(isset($_SESSION['username'])) {
  include('header-profil.php'); 
  include('form-edit-profil.php');
  include('footer-admin.php');
} else {
  echo "ERROR!";
}
?>