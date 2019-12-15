<!-- Page content -->
<div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Edit Foto Profil</a>
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
              </div>
            </div>
            <div class="card-body">
              <form action="proses-update.php" action="POST">
                <h6 class="heading-small text-muted mb-4">Informasi Akun</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" name="username" class="form-control form-control-alternative" value="<?php echo $_SESSION['username']; ?>" disabled>
                        <input type="text" name="id" class="form-control form-control-alternative" value="<?php echo $_SESSION['id']; ?>" hidden>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Alamat Email</label>
                        <input type="email" name="email" class="form-control form-control-alternative" value="<?php echo $_SESSION['email']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control form-control-alternative" value="<?php echo $_SESSION['nama']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-address">Jenis Kelamin</label>
                        <div class="custom-control custom-radio mb-3">
                        <input type="radio" name="jenkel" class="custom-control-input" value="L" id="L" <?php if($_SESSION['jk']=="L"){ echo "checked";}?>/>
                          <label class="custom-control-label" for="L">Laki-Laki</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                          <input type="radio" name="jenkel" class="custom-control-input" id="P" value="L" <?php if($_SESSION['jk']=="P"){ echo "checked";}?>/>
                          <label class="custom-control-label" for="P">Perempuan</label>
                        </div>
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
                        
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker" name="tglLahir"  placeholder="Select date" type="text" value="<?php echo $_SESSION['tglLahir']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Alamat</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <textarea rows="4" name="alamat" class="form-control form-control-alternative"><?php echo $_SESSION['alamat']; ?></textarea>
                  </div>
                </div>
                <input type="submit" value="Simpan" name="update" class="btn btn-primary">
                <input TYPE="button" VALUE="Batal" onClick="history.go(-1);" class="btn btn-warning">
              </form>
            </div>
          </div>
        </div>
      </div>