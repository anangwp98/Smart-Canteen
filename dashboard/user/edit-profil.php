
<?php
session_start();
if(isset($_SESSION['id_user'])) {
  include('header-user.php'); 
  include('form-edit-profil.php');
  include('footer-user.php');
} else {
  echo "ERROR!";
}
?>