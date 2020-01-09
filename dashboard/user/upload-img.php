<?php 
include('../koneksi.php');
session_start();

if(isset($_POST['submit-img'])) {
    $id_user_upload = $_SESSION['id_user'];
    $cek_gambar = $_POST['cek_gambar'];
     
    $name_gambar = $_POST['nm_g'];

    $id_upload = rand();
    $file = $_FILES['profilImg'];
    $fileName = $_FILES['profilImg']['name'];
    $fileTmpName = $_FILES['profilImg']['tmp_name'];
    $fileSize = $_FILES['profilImg']['size'];
    $fileError = $_FILES['profilImg']['error'];
    $fileType = $_FILES['profilImg']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg', 'png');
    if(in_array($fileActualExt, $allowed)){
        if($fileError===0) {
            if($fileSize < 1000000) {
                unlink('../assets/img/profil-user/'.$name_gambar);
                $filenameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../assets/img/profil-user/'.$filenameNew;

                if ($cek_gambar == 1) {
                        $queryUpload = "UPDATE `profil_img` SET `status`='$filenameNew' WHERE `id_user`='$id_user_upload';";
                        if(mysqli_query($koneksi, $queryUpload)) {
                            header("location: ./view-profil.php?upload-success");
                        } else {
                            echo"<script language='javascript'> alert('Data Gagal DI Update!');history.go(-1); </script>";
                        }
                        
                        move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    $queryUpload = "INSERT INTO `profil_img` (`id_profil`, `id_user`, `status`) VALUES ('$id_upload', '$id_user_upload', '$filenameNew');";
                    if(mysqli_query($koneksi, $queryUpload)) {
                        header("location: ./view-profil.php?upload-success");
                    } else {
                        echo"<script language='javascript'> alert('Data Gagal Disimpan!'); </script>";
                    }
                    
                    move_uploaded_file($fileTmpName, $fileDestination);
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
}

?>