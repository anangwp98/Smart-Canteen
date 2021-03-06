 <!-- Page content -->
 <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Menu Kamu</h3>
                  <button type="button" class="col-lg-3 btn btn-block btn-white" data-toggle="modal" data-target="#modal-input-menu"><i class="fas fa-archive"></i> Tambah Pedagang</button>
                  <hr>
                  <div class="modal fade" id="modal-input-menu" tabindex="-1" role="dialog" aria-labelledby="modal-input-menu" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-transparent pb-0">
                              <div class="text-muted text-center mt-2 mb-3"><small>Masukkan Data Menu</small></div>
                                <div class="card-body px-lg-5 py-lg-5">
                                  <form action="./proses-topup.php" method="POST"  enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-archive"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Nama Menu" type="text" name="nama">
                                      </div>
                                    </div>
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Harga" type="text" name="harga">
                                      </div>
                                    </div>
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                      
                                        <input class="form-control" type="file" name="gmbr">
                                      </div>
                                    </div>
                                    <div class="text-center">
                                      <input type="submit" name="simpan_menu" class="btn btn-primary my-4" value="Proses">
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">

            <?php

            $data_menu = "SELECT * FROM menu WHERE id_pedagang='" . $_SESSION['id_pedagang'] . "'";
            $hasil_menu = mysqli_query($koneksi, $data_menu); 

            $total_record_menu = mysqli_num_rows($hasil_menu);
            ?>
              <!-- Projects table -->
              <table id="tabel-data-user" class="table align-items-center">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Menu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Pedagangan</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                
            if (($total_record_menu) > 0) {
              while($row = mysqli_fetch_assoc($hasil_menu)) {
                  echo "<tr>
                    <th scope='row'>" . "<img src='$row[file]' style='width: 200px'>" . "</th>
                    <td>" . $row["name_menu"]."</td>
                    <td>".$row["harga"]."</td>
                    <td>".$row["id_pedagang"]."</td>
                    <td>
                    <button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#modal-hapus". $row["id_menu"] . "'>Hapus</button>
                    
                    </td>
                  </tr>"; ?>
                  
                <!--
                ======================================================================================
                        SCRIPT UNTUK MENAMPILKAN MODAL VIEW
                ======================================================================================
                -->
                  <div class="modal fade" id="modal-notification<?php echo $row["id_menu"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">    
                        <div class="modal-header">
                          <h2 class="modal-title" id="modal-title-notification">ID - <?php echo $row["id_menu"] ?></h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                         </div>
                         <div class="modal-body">          
                            <div class="py-3 text-center">
                              <p><?php echo "Gambar Menu"; ?></p>
                              <h3>Menu : </h3><p><?php echo $row["name_menu"] ?></p>
                              <h3>Harga : </h3><p><?php echo "Rp. ".$row["harga"].",-" ?></p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input class="form-control" placeholder="Qty" type="text" name="jml_pesan">
                            <a href="input-pesanan.php?id=<?php echo $row['id_menu']; ?>"><button type="button" class="btn btn-white">Masukkan Pesanan Saya</button></a>
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--
                ======================================================================================
                        SCRIPT AKHIR MENAMPILKAN MODAL
                ======================================================================================
                --> 
                <div class="modal fade" id="modal-hapus<?php echo $row["id_menu"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-1-hapus" aria-hidden="true">
                  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">
                      <div class="modal-header">
                        <h2 class="modal-title" id="modal-1-hapus">HAPUS <?php echo $row["id_menu"]; ?></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="py-3 text-center">
                          <h3>Apakah anda yakin menghapus pesanan : </h3><p><?php echo $row["name_menu"] ?></p><br />
                        </div>    
                      </div>
                      <div class="modal-footer">
                      <a href="hapus-menu.php?id=<?php echo $row["id_menu"];?>"><button type="button" class="btn btn-white">HAPUS</button></a>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batal</button> 
                      </div> 
                    </div>
                  </div>
                </div>
                <!--
                ======================================================================================
                        SCRIPT AKHIR MENAMPILKAN MODAL
                ======================================================================================
                -->
                

                

        <?php 
        };
              } else {
              echo "<div class='alert alert-warning text-center' role='alert> 
              <span class='alert-inner--icon><strong>Warning!</strong> Tidak ada data ditemukan</span>
              
              </div>";
            }
                ?>
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>