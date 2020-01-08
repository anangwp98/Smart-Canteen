<?php
    include('./dashboard/koneksi.php');
    $query_website = "SELECT * FROM website";
    $data_website= mysqli_query($koneksi, $query_website );
    $cek_data_website = mysqli_num_rows($data_website);
	if($cek_data_website > 0) {
        $website_nama = mysqli_fetch_assoc($data_website);
        $id_website         = $website_nama['id_website'];
        $nama_website       = $website_nama['nama'];
        $deskripsi_website  = $website_nama['deskripsi'];
    } else {
        $nama_website       = "Rubah saya!";
        $deskripsi_website  = "Deskripsi saya!";
    }

    $query_unduh = "SELECT * FROM download";
    $data_unduh= mysqli_query($koneksi, $query_unduh );
    $cek_data_unduh = mysqli_num_rows($data_unduh);
	
?>