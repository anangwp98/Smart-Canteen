<!-- Page content -->
<div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                <?php
		            	$id_user_user = $_SESSION['id_user'];
                  $sqlImg = "SELECT * FROM profil_img WHERE id_user='$id_user_user'";
                  $resultImg = mysqli_query($koneksi, $sqlImg);
                 
                  while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                    echo "<div>";
                      if ( $rowimg['status'] > 0) {
                        echo "<img src='../assets/img/profil-user/".$rowimg['status']."' class='rounded-circle'>";
                      } else {
                        echo "BELUM ADA FOTO";
                      }
                    echo "</div>";
                  }
?>
                </div>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo $_SESSION['nama']; ?><span class="font-weight-light">, 27</span>
                </h3>
                <div class="h5 font-weight-300 capitalize-css">
                  <i class="ni location_pin mr-2"></i><?php echo $_SESSION['level']; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Akun Saya</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="edit-profil.php?id=<?php echo $_SESSION['id_user']; ?>" class="btn btn-sm btn-primary">Edit Profil Saya</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Informasi Akun</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">ID USER</label>
                        <input class="form-control form-control-alternative" disabled value="<?php echo $_SESSION['id_user']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Alamat Email</label>
                        <label class="form-control form-control-alternative"><?php echo $_SESSION['email']; ?></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nama Lengkap</label>
                        <label class="form-control form-control-alternative"><?php echo $_SESSION['nama']; ?></label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Jenis Kelamin</label>
                        <label class="form-control form-control-alternative">
                          <?php
                            if($_SESSION['jk'] == 'L') {
                              echo "Laki-Laki";
                            } else if ($_SESSION['jk'] == 'P') {
                              echo "Perempuan";
                            } else {
                              echo "Belum Terdefinisikan";
                            }
                          ?>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Tanggal Lahir</label>
                        <label class="form-control form-control-alternative"><?php echo $_SESSION['tgl_lahir']; ?></label>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Alamat</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <textarea rows="4" class="form-control form-control-alternative" disabled><?php echo $_SESSION['alamat']; ?></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>