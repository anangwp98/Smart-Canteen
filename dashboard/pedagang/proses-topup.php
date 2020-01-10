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
} else if(isset($_POST['simpan_menu'])) {
    $id_pedagang        = $_SESSION['id_pedagang'];
    $namaMenu             = $_POST['nama'];
    $harga             = $_POST['harga'];
    $id_menu = "MN-".rand();
    // $id = rand();
    // echo $harga;
    $file_menu = $_FILES['gmbr'];
    $fileName_menu = $_FILES['gmbr']['name'];
    $fileTmpName_menu = $_FILES['gmbr']['tmp_name'];
    $fileSize_menu = $_FILES['gmbr']['size'];
    $fileError_menu = $_FILES['gmbr']['error'];
    $fileType_menu = $_FILES['gmbr']['type'];

    $fileExt_menu = explode('.', $fileName_menu);
    $fileActualExt_menu = strtolower(end($fileExt_menu));

    $allowed = array('jpg','jpeg', 'png');


    if(in_array($fileActualExt_menu, $allowed)){
        if($fileError_menu===0) {
            if($fileSize_menu < 9000000000) {
                
                
                $filenameNew_menu =$fileName_menu;
                $fileDestination_menu = '../assets/img/menu/'.$filenameNew_menu;
                echo $filenameNew_ktm;
                    $queryUpload_menu = "INSERT INTO `menu` (`id_menu`, `name_menu`, `harga`, `id_pedagang`, `file`) VALUES ('$id_menu', '$namaMenu', '$harga', '$id_pedagang', '$fileDestination_menu');";
                    if(mysqli_query($koneksi, $queryUpload_menu)) {
                        header("location: ./view-menu.php?upload-success");
                    } else {
                        echo"<script language='javascript'> alert('Data Gagal Disimpan!'); </script>";
                    }
                    
                        move_uploaded_file($fileTmpName_menu, $fileDestination_menu);
                
            } else {
                echo "Your file is too big1";
            }
        } else {
            echo "There was an error uploading your files";
        }
    } else {
        echo "You cannot upload file of this type";
    }
} else {
    echo "<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";

}
?>