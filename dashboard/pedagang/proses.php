
<?php 
require_once("../koneksi.php");

/*
========================================================================
			PROSES LOGIN
========================================================================
*/

$username = $_POST['username'];
$password = $_POST['password'];


if($password == '' AND $username == '') {
	echo"<script language='javascript'> alert('Username dan password harus diisi!');history.go(-1); </script>";
} else if ( $password=='') {
	echo"<script language='javascript'> alert('Password harus diisi!');history.go(-1); </script>";
} else if ( $username == '') {
	echo"<script language='javascript'> alert('Username harus diisi!');history.go(-1); </script>";
} else {	
	$query_login = mysqli_query($koneksi, "SELECT * FROM pedagang WHERE id_pedagang='$username' AND password='$password'" );
	$cek_data = mysqli_num_rows($query_login);
	if($cek_data > 0) {
		session_start();
		$data = mysqli_fetch_assoc($query_login);
		if($data['level']=="pedagang"){
			// cek jika user login sebagai user
			$_SESSION['id_pedagang'] = $data['id_pedagang'];
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['password'] = $data['password'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['jk'] = $data['jk'];
			$_SESSION['alamat'] = $data['alamat'];
			$_SESSION['tgl_lahir'] = $data['tgl_lahir'];
			$_SESSION['telepon'] = $data['telepon'];
			$_SESSION['id_admin'] = $data['id_admin'];
			$_SESSION['level'] = "pedagang";
			// alihkan ke halaman login kembali
			header("location: ./index.php");
		} else {
			session_destroy();
			header("location: ./login.php");
		}
	} else {
		echo"<script language='javascript'> alert('Username atau password salah!');history.go(-1); </script>";
	}
}
?>