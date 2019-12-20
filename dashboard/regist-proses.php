<?php

require_once("./koneksi.php");

if(isset($_POST['btn_register'])){
    $nama = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $email = mysqli_real_escape_string($koneksi, trim($_POST['email']));
    $password = mysqli_real_escape_string($koneksi, trim($_POST['password']));

    if ($_POST['check'] != 'checked'){
       header('location: ./register.php?pesan=checked');
    }
    else{
        $sql = 'insert into user (nama, id_user, email, password,level) values (
            "'.$nama.'",
            "'.$username.'",
            "'.$email.'",
            "'.$password.'",
            "user"
        )';
        mysqli_query($koneksi, $sql);
        header ('location: ./login.php?pesan=register-success');
    }
}
?>