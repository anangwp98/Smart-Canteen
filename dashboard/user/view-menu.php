    <?php
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user'])){
	header("location:./../index.php");
} else {
    include('data-menu.php');
}
?>