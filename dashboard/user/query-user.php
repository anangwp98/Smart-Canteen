<?php
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user'])){
	header("location:./../index.php");
} else {
    $sql_view_saldo = "SELECT dompet.saldo as 'jmlsaldo' FROM `dompet` JOIN user ON user.id_user=dompet.id_user WHERE user.id_user='$_SESSION[id_user]'";
    $query_view_saldo= mysqli_query($koneksi, $sql_view_saldo );
    $jml_saldo = mysqli_fetch_array($query_view_saldo);
    
    $cek_data = mysqli_num_rows($query_view_saldo);

    if($cek_data == NULL) {
        $a = "Belum Memiliki Dompet";
        $showCreateDompet = true;
    } else if ($cek_data > 0){
        $mataUang = "Rp. ";
        $akhirMataUang = ",-";
        $a = $mataUang.$jml_saldo['jmlsaldo'].$akhirMataUang;
        $showCreateDompet = false;
    } else if ($cek_data == 0) {
        $a = '0';
    } else {
        echo "Gagal mendapatkan data";
    }
}
?>