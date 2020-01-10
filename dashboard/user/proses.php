<?php
include('../koneksi.php');
session_start();
if(isset($_POST['create_dompet'])) {
    $id_user        = $_SESSION['id_user'];
    $saldo = 0;
    $new_auto_increment = rand();
    $id="DP".$new_auto_increment;
    $query="INSERT INTO `dompet` (`id_dompet`, `saldo`, `id_user`) VALUES ('$id', '$saldo', '$id_user');";
    if(mysqli_query($koneksi, $query)) {
        header("location:./index.php");
    } else {
        echo"<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";
    }
} else if(isset($_POST['input_topup'])) {
    $nominal            = $_POST['nominal'];
    $id_user            = $_SESSION['id_user'];

    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    
    $date_detail = date('Y-m-d H:i:s');
    $id="TP".rand().$date;
    $query="INSERT INTO `topup` (`id_topup`,`id_user`,`jml_topup`,`tgl_topup`) VALUES ('$id', '$id_user', '$nominal', '$date_detail' )";
    if(mysqli_query($koneksi, $query)) {
        $statusTopup = "sukses";
        header("location:./index.php");
    } else {
        echo"<script language='javascript'> alert('Data Gagal Disimpan!'); </script>";
    }
}else if(isset($_POST['bayar_tagihan'])) {
    $nominal            = $_POST['total_bayar'];
    $id_user            = $_SESSION['id_user'];

    // date_default_timezone_set('Asia/Jakarta');
    // $date = date('Y-m-d');
    
    // $date_detail = date('Y-m-d H:i:s');
    // $id="TP".rand().$date;

    $querylihatsaldo = "SELECT * FROM dompet WHERE id_user='$id_user'";

    $hasil_query_saldo = mysqli_query($koneksi, $querylihatsaldo); 
    $total_recordl_query_saldo = mysqli_num_rows($hasil_query_saldo);

    if($total_recordl_query_saldo > 0 ) {
        while($row9 = mysqli_fetch_assoc($hasil_query_saldo)) {
            $hasil = $row9['saldo'] - $nominal;
            if($row9['saldo'] > $nominal) {
                $querybayar = "UPDATE dompet SET saldo=$hasil WHERE id_user='$id_user'";
                if(mysqli_query($koneksi, $querybayar)) {
                    
                    $queryHapus = "UPDATE pemasanan SET status='SELESAI' WHERE id_user='$id_user'";
                    if(mysqli_query($koneksi, $queryHapus)) {
                        header("location:./view-pesanan.php");
                    } else {
                        echo"<script language='javascript'> alert('Data Gagal Dihapus!');history.go(-1); </script>";
                    }
                } else {
                    echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
                }
            } else if($row9['saldo'] < $nominal || $nominal == NULL) { 
                echo"<script language='javascript'> alert('Saldo Anda Kurang atau Tidak Ada Tagihan! Data Gagal Disimpan!');history.go(-1); </script>";
            }
        }
    }
} else if(isset($_POST['input_transfer'])) {
    $id                 = $_SESSION['id_user'];
    $nama_user          = $_POST['id_penerima'];
    $jml_tf     = $_POST['totaltransfer'];

    $query_cek_saldo_transfer = "SELECT * FROM dompet WHERE id_user='$id'";
    $hasil_query_cek_saldo_transfer = mysqli_query($koneksi, $query_cek_saldo_transfer); 
    $total_record_query_cek_saldo_transfer = mysqli_num_rows($hasil_query_cek_saldo_transfer);

    if($total_record_query_cek_saldo_transfer > 0 ) {
        while($row_cek_tf = mysqli_fetch_assoc($hasil_query_cek_saldo_transfer)) {
            if($jml_tf > $row_cek_tf['saldo']) {
                ?><script type="text/javascript">
                    alert("GAGAL Transfer!");
                    window.location.href="index.php";
                </script>
                <?php 
            } else {
                $query_tf = "UPDATE `dompet` SET saldo = saldo+$jml_tf WHERE id_user='$nama_user'";
                if( mysqli_query($koneksi, $query_tf)) {
                    $query_pengirim = "UPDATE `dompet` SET saldo = saldo-$jml_tf WHERE id_user='$id'";
                    if(mysqli_query($koneksi, $query_pengirim)) {
                    ?>
                        <script type="text/javascript">
                            alert("Berhasil Transfer! Selamat!");
                            window.location.href="index.php";
                        </script>
                <?php
                    } else {
                        echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
                    }
                }  else {
                    echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
                }
            }
        }
    }
} else {
    echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
}

?>