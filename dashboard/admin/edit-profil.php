
<?php
session_start();
if(isset($_SESSION['id_user'])) {
  include('header-profil.php'); 
  include('form-edit-profil.php');
  include('footer-admin.php');
} else {
  echo "ERROR!";
}
?>