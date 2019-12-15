
<?php 
session_start();

include("koneksi.php");

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
	$query_login = mysqli_query($koneksi, "SELECT id, username, nama, email, password, DATE_FORMAT(tglLahir, '%M %d %Y') as tglLahir, jk, alamat, nomorTelp, level FROM users WHERE username='$username' AND password=md5('$password')");
	$cek_data = mysqli_num_rows($query_login);
	if($cek_data > 0) {
		$data = mysqli_fetch_assoc($query_login);
		// cek jika user login sebagai admin
		if($data['level']=="admin"){
			// buat session login dan username
			$_SESSION['id'] = $data['id'];
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $data['email'];
			$_SESSION['tglLahir'] = $data['tglLahir'];
			$_SESSION['alamat'] = $data['alamat'];
			$_SESSION['notelp'] = $data['nomorTelp'];
			$_SESSION['jk'] = $data['jk'];
			$_SESSION['level'] = "admin";
			// alihkan ke halaman dashboard admin
			header("location:./admin/");
		}else if($data['level']=="user"){
			// buat session login dan username
			$_SESSION['id'] =$data['id'];
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $data['email'];
			$_SESSION['tglLahir'] = $data['tglLahir'];
			$_SESSION['alamat'] = $data['alamat'];
			$_SESSION['notelp'] = $data['nomorTelp'];
			$_SESSION['level'] = "user";
			// alihkan ke halaman login kembali
			header("location:./user/");
		}
	}else{
		echo"<script language='javascript'> alert('Username atau password salah!');history.go(-1); </script>";
	}
}
?>