<?php 
include('../koneksi.php');
include('query-user.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Welcome <?php echo $_SESSION['nama']; ?>
  </title>
  
<?php
  $id_user= $_SESSION['id_user'];
  $sqlImg = "SELECT * FROM profil_img WHERE id_user='$id_user'";
  $resultImg = mysqli_query($koneksi, $sqlImg);

  while ($rowimg = mysqli_fetch_assoc($resultImg)) {
      if ( $rowimg['status'] > 0) {
        $linkFavicon= "../assets/img/profil-user/".$rowimg['status']."";
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
  <link href="../assets/css/style.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link href="../assets/css/style.css"/>

  <!-- CSS untuk DataTable -->
  <link rel="stylesheet" type="text/css" href="../assets/datables/datatables.min.css"/>
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.php">
        <img src="../assets/img/brand/logo_smartcanteen_regular.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="../index.html">
                <img src="../assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <?php
        include('sidebar-user.php');
        ?>
        
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">Dashboard</a>
        <!-- User -->

        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  
                <?php
		            	$id_user_user = $_SESSION['id_user'];
                  $sqlImg = "SELECT * FROM profil_img WHERE id_user='$id_user_user'";
                  $resultImg = mysqli_query($koneksi, $sqlImg);
                 
                  while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                    echo "<span class='avatar avatar-sm rounded-circle'>";
                      if ( $rowimg['status'] > 0) {
                        echo "<img src='../assets/img/profil-user/".$rowimg['status']."' class='rounded-circle'>";
                      } else {
                        echo "BELUM ADA FOTO";
                      }
                    echo "</span>";
                  }
                  ?>

                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <b> <?php echo $_SESSION['nama'];?> </b>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0"><?php echo $_SESSION['id_user']; ?></h6>
              </div>
              <a href="./view-profil.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="../logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tagihan Pesanan Saya</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $status_pesanan?></span>
                        <?php

                        if($jml_total_pesanan['total_pesanan'] > 0 ) {
                          echo "
                          <form action='./proses.php' method='POST'>
                          <input type='text' value='$jml_total_pesanan1' name='total_bayar' hidden>
                          <button class='btn btn-icon btn-info btn-card-1' type='sumbit' name='bayar_tagihan'>
                          <span class='btn-inner--icon'><i class='fas fa-money-bill-wave'></i></span>

                          <span class='btn-inner--text'>Bayar</span>
                          </button>
                          </form>";
                        }

                        ?>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <i class="fas fa-file-invoice-dollar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Saldo Saya</h5>
                      <span class="font-weight-bold mb-0 font-biru"><?php echo $a; ?></span>
                      <?php
                        if ($showCreateDompet == true) {
                            echo "<br>                                               
                            <p class='mt-3 mb-0 text-muted text-sm'>                                      
                            <button class='btn btn-icon btn-info btn-card-1' type='button' data-toggle='modal' data-target='#modal-input-topup'>
                            <span class='btn-inner--icon'><i class='fas fa-plus'></i></span>

                            <span class='btn-inner--text'>Buka</span>
                          </button>
                        </p>
                        <div class='modal fade' id='modal-input-topup' tabindex='-1' role='dialog' aria-labelledby='modal-input-topup' aria-hidden='true'>
                        <div class='modal-dialog modal- modal-dialog-centered modal-xl' role='document'>
                          <div class='modal-content'>
                            <div class='modal-body p-0'>
                              <div class='card bg-secondary shadow border-0'>
                                <div class='card-header bg-transparent pb-0'>
                                  <div class='text-muted text-center mt-2 mb-3'><small>Yakin anda membuat dompet?</small></div>
                                    <div class='card-body px-lg-5 py-lg-5'>
                                      <form action='./proses.php' method='POST'>
                                        <div class='text-center'>
                                          <input type='hidden' name='id' class='btn btn-primary my-4'>
                                          <input type='submit' name='create_dompet' class='btn btn-primary my-4' value='Ya'>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>";
                        } else {
                          echo "
                                <p class='mt-3 mb-0 text-muted text-sm'>                                      
                                    <button class='btn btn-icon btn-info btn-card-1' type='button' data-toggle='modal' data-target='#modal-input-topup'>
                                    <span class='btn-inner--icon'><i class='fas fa-plus'></i></span>

                                    <span class='btn-inner--text'>Top Up</span>
                                  </button>
                                </p>
                                <div class='modal fade' id='modal-input-topup' tabindex='-1' role='dialog' aria-labelledby='modal-input-topup' aria-hidden='true'>
                                <div class='modal-dialog modal- modal-dialog-centered modal-xl' role='document'>
                                  <div class='modal-content'>
                                    <div class='modal-body p-0'>
                                      <div class='card bg-secondary shadow border-0'>
                                        <div class='card-header bg-transparent pb-0'>
                                          <div class='text-muted text-center mt-2 mb-3'><small>Masukan jumlah top up anda!</small></div>
                                            <div class='card-body px-lg-5 py-lg-5'>
                                              <form action='./proses.php' method='POST'>
                                                <div class='form-group mb-3'>
                                                  <div class='input-group input-group-alternative'>
                                                    <div class='input-group-prepend'>
                                                      <span class='input-group-text'><i class='fas fa-archive'></i></span>
                                                    </div>
                                                    <input class='form-control' placeholder='id' type='hidden' name='id'>
                                                    <input class='form-control' placeholder='Nominal' type='text' name='nominal'>
                                                  </div>
                                                  <br>
                                                </div>
                                                <div class='text-center'>
                                                  <input type='submit' name='input_topup' class='btn btn-primary my-4' value='Proses'>
                                                </div>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                ";
                        }
                      ?>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      <i class="fas fa-wallet"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Lihat Menu</h5>
                      <span class="h2 font-weight-bold mb-0"><p><strong><?php echo $jml_menu ?></strong> Menu di sini</p></span>
                      <a href="./view-semua-menu.php">
                      <button class='btn btn-icon btn-secondary btn-card-1' type='button'>
                        <span class='btn-inner--icon'><i class='far fa-eye'></i></span>
                        <span class='btn-inner--text'>Lihat</span>
                      </button>
                      </a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    