<?php 
include ('../koneksi.php');
session_start();
if(isset($_POST['simpan_topup'])){
    $id           = $_SESSION['id_pedagang'];
    $nama_user           = $_POST['id_user'];
    $jml_topup          = $_POST['totaltopup'];
    $id_topup = "TP-".rand();
    $id_log_topup = "LGTP-".rand();

    $query = "INSERT INTO `topup` (`id_topup`, `id_user`, `jml_topup`, `tgl_topup`, `status`) VALUES ('$id_topup', '$nama_user', '$jml_topup', CURRENT_TIMESTAMP(), 'SELESAI');";
    if(mysqli_query($koneksi, $query)) {
        $query_log = "SELECT * FROM `dompet` WHERE id_user='$nama_user'";
        $hasil_query_log = mysqli_query($koneksi, $query_log); 
        $total_record_log = mysqli_num_rows($hasil_query_log);
        if (($total_record_log) > 0) {
            while($row10 = mysqli_fetch_assoc($hasil_query_log)) {

                $b = (int)$jml_topup;
                if (is_numeric($b)) {
        
                    $saldo_akhir = ($row10['saldo'] + $_POST['totaltopup']);
                  } else {
                    $saldo_akhir = 0;
                  }
                $query_log = "INSERT INTO `log_topup` (`id`, `tgl_diterima`, `saldo_awal`, `saldo_akhir`, `id_user`, `id_topup`) VALUES ('$id_log_topup', CURRENT_TIMESTAMP(), '$a', '$saldo_akhir', '$nama_user', '$id_topup');";
                if(mysqli_query($koneksi, $query_log)) {
                    header("location: ./index.php");
                } else {
                    echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
                }

            }
        } else {
            echo "SALAH";
        }
    } else {
        echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
    }
} else {
    echo "<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";
}
?>