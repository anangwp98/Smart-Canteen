<?php 
include ('../koneksi.php');
session_start();
if(isset($_POST['update'])){
    $id             = $_SESSION['id_user'];
    $nama           = $_POST['nama'];
    $email          = $_POST['email'];
    $jk             = $_POST['jenkel'];
    $tglLahir       = $_POST['tglLahir'];
    $alamat         = $_POST['alamat'];
    $telepon         = $_POST['telepon'];
    $sqlDate        = date('Y-m-d', strtotime($tglLahir));

    $query = "UPDATE `user` SET `nama`='$nama', `email`='$email',  `jk`='$jk', `alamat`='$alamat', `tgl_lahir`='$sqlDate',`telepon`='$telepon' WHERE `user`.`id_user`='$id'";
    if(mysqli_query($koneksi, $query)) {
        header("location: view-profil.php");
    } else {
        echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
    }
}else if (isset($_POST['simpan_ktp'])){
    
    $id                 = $_POST['idKTP'];
    $id_user_identitas  = $_SESSION['id_user'];
    $nameRecKTP         = $_POST['nameKTP'];
    $queryKTP = "SELECT * FROM `personal_identity` WHERE id_user='$id_user_identitas'";
    $sql_select_ktp= mysqli_query($koneksi, $queryKTP);
    $view_select_ktp = mysqli_num_rows($sql_select_ktp);

    if ($view_select_ktp > 0) {
      $cekKTP = 1;
    } else {
        $cekKTP = 0;
    }

    $id_upload = rand();
    $file_ktp = $_FILES['docKTP'];
    $fileName_ktp = $_FILES['docKTP']['name'];
    $fileTmpName_ktp = $_FILES['docKTP']['tmp_name'];
    $fileSize_ktp = $_FILES['docKTP']['size'];
    $fileError_ktp = $_FILES['docKTP']['error'];
    $fileType_ktp = $_FILES['docKTP']['type'];


    $fileExt_ktp = explode('.', $fileName_ktp);
    $fileActualExt_ktp = strtolower(end($fileExt_ktp));

    $allowed = array('jpg','jpeg', 'png');


    if(in_array($fileActualExt_ktp, $allowed)){
        if($fileError_ktp===0) {
            if($fileSize_ktp < 9000000000) {
                
                unlink('../assets/img/datadiri/'.$nameRecKTP);
                $filenameNew_ktp =$fileName_ktp;
                $fileDestination_ktp = '../assets/img/datadiri/'.$filenameNew_ktp;

                if ($cekKTP == 1) {
                        $queryUpload_ktp = "UPDATE `personal_identity` SET `ktp`='$filenameNew_ktp' WHERE `id_user`='$id_user_identitas';";
                        if(mysqli_query($koneksi, $queryUpload_ktp)) {
                            header("location: ./view-profil.php?upload-success");
                        } else {
                            echo"<script language='javascript'> alert('Data Gagal DI Update!');history.go(-1); </script>";
                        }
                        
                        move_uploaded_file($fileTmpName_ktp, $fileDestination_ktp);
                } else {
                    $queryUpload_ktp = "INSERT INTO `personal_identity` (`id_personal_identity`,`id_user`, `ktp`) VALUES ('$id_upload', '$id_user_identitas', '$fileName_ktp');";
                    if(mysqli_query($koneksi, $queryUpload_ktp)) {
                        header("location: ./view-profil.php?upload-success");
                    } else {
                        echo"<script language='javascript'> alert('Data Gagal Disimpan!');; </script>";
                    }
                    
                        move_uploaded_file($fileTmpName_ktp, $fileDestination_ktp);
                }
            } else {
                echo "Your file is too big1";
            }
        } else {
            echo "There was an error uploading your files";
        }
    } else {
        echo "You cannot upload file of this type";
    }
    

} else if (isset($_POST['simpan_ktm'])){
    $id                 = $_POST['idKTM'];
    $id_user_identitas  = $_SESSION['id_user'];
    $nameRecKTM         = $_POST['nameKTM'];

    if($nameRecKTM == NULL) {
        
    } else {
        unlink('../assets/img/datadiri/'.$nameRecKTM);
    }
    $queryKTM = "SELECT * FROM `personal_identity` WHERE id_user='$id_user_identitas'";
    $sql_select_ktm= mysqli_query($koneksi, $queryKTM);
    $view_select_ktm = mysqli_num_rows($sql_select_ktm);

    if ($view_select_ktm > 0) {
      $cekKTM = 1;
    } else {
        $cekKTM = 0;
    }
    
    $id_upload = rand();
    $file_ktm = $_FILES['docKTM'];
    $fileName_ktm = $_FILES['docKTM']['name'];
    $fileTmpName_ktm = $_FILES['docKTM']['tmp_name'];
    $fileSize_ktm = $_FILES['docKTM']['size'];
    $fileError_ktm = $_FILES['docKTM']['error'];
    $fileType_ktm = $_FILES['docKTM']['type'];


    $fileExt_ktm = explode('.', $fileName_ktm);
    $fileActualExt_ktm = strtolower(end($fileExt_ktm));

    $allowed = array('jpg','jpeg', 'png');


    if(in_array($fileActualExt_ktm, $allowed)){
        if($fileError_ktm===0) {
            if($fileSize_ktm < 9000000000) {
                
                
                $filenameNew_ktm =$fileName_ktm;
                $fileDestination_ktm = '../assets/img/datadiri/'.$filenameNew_ktm;
                // echo $filenameNew_ktm;
                if ($cekKTM == 1) {
                        $queryUpload_ktm = "UPDATE `personal_identity` SET `ktm`='$filenameNew_ktm' WHERE `id_user`='$id_user_identitas'";
                        if(mysqli_query($koneksi, $queryUpload_ktm)) {
                            header("location: ./view-profil.php?upload-success");
                        } else {
                            echo"<script language='javascript'> alert('Data Gagal DI Update!'); </script>";
                        }
                        
                        move_uploaded_file($fileTmpName_ktm, $fileDestination_ktm);
                } else {
                    $queryUpload_ktm = "INSERT INTO `personal_identity` (`id_personal_identity`,`id_user`, `ktm`) VALUES ('$id_upload', '$id_user_identitas', '$fileName_ktm');";
                    if(mysqli_query($koneksi, $queryUpload_ktm)) {
                        header("location: ./view-profil.php?upload-success");
                    } else {
                        echo"<script language='javascript'> alert('Data Gagal Disimpan!'); </script>";
                    }
                    
                        move_uploaded_file($fileTmpName_ktm, $fileDestination_ktm);
                }
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
    echo "ERROR";
}