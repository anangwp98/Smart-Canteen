
<?php
  $id_user_admin = $_SESSION['id_user'];
  $sqlImg = "SELECT * FROM profil_img WHERE id_user='$id_user_admin'";
  $resultImg = mysqli_query($koneksi, $sqlImg);

  while ($rowimg = mysqli_fetch_assoc($resultImg)) {
      if ( $rowimg['status'] > 0) {
        $linkFavicon= "../assets/img/fotoprofil/".$rowimg['status']."";
      } else {
        echo "BELUM ADA FOTO";
      }
  }
?>

<link href="<?php echo $linkFavicon ?>" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />

  <!-- CSS untuk DataTable -->
  <link rel="stylesheet" type="text/css" href="../assets/datables/datatables.min.css"/>
  
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>