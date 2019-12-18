
<?php 
require_once("koneksi.php");

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
	$query_login = mysqli_query($koneksi, "select * from user where id_user='$username' and password='$password'" );
	$cek_data = mysqli_num_rows($query_login);
	if($cek_data > 0) {
		session_start();
		$data = mysqli_fetch_array($query_login);
		// cek jika user login sebagai admin
			$_SESSION['id_user'] =$data['id_user'];
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['password'] = $data['password'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['jk'] = $data['jk'];
			$_SESSION['alamat'] = $data['alamat'];
			$_SESSION['tgl_lahir'] = $data['tgl_lahir'];
			// alihkan ke halaman login kembali
			header("location:./admin/index.php");
	}else{
		echo"<script language='javascript'> alert('Username atau password salah!');history.go(-1); </script>";
	}
}
?>