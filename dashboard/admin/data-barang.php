
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Data Barang</h3>
                  <hr>
                  <button type="button" class="col-lg-3 btn btn-block btn-white" data-toggle="modal" data-target="#modal-input-barang"><i class="fas fa-archive"></i> Tambah Barang</button>
                  <div class="modal fade" id="modal-input-barang" tabindex="-1" role="dialog" aria-labelledby="modal-input-barang" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-transparent pb-0">
                              <div class="text-muted text-center mt-2 mb-3"><small>Masukkan Data Barang</small></div>
                                <div class="card-body px-lg-5 py-lg-5">
                                  <form action="./proses.php" method="POST">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-archive"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="username" type="hidden" name="id">
                                        <input class="form-control" placeholder="Nama Barang" type="text" name="nama">
                                      </div>
                                    </div>
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Harga" type="text" name="harga">
                                      </div>
                                    </div>
                                    <div class="text-center">
                                      <input type="submit" name="simpan_barang" class="btn btn-primary my-4" value="Proses">
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
                $query_view_barang = "SELECT * FROM barang";
                $sql_view_barang= mysqli_query($koneksi, $query_view_barang );
                $view_barang = mysqli_num_rows($sql_view_barang);
            ?>
              <!-- Projects table -->
              <table id="tabel-data-barang" class="table align-items-center">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                if (($view_barang) > 0) {
                    while($vi_barang = mysqli_fetch_assoc($sql_view_barang)) {      
                    echo "<tr> <th scope='row'>" . $vi_barang["id_barang"]."</th>
                        <th scope='row'>" . $vi_barang["nama_barang"]. "</th>
                        <td>Rp. " . $vi_barang["harga"]." ,-</td>
                        <td scope='row'>
                        <button type='button' class='btn btn-outline-info' data-toggle='modal' data-target='#modal-notification". $vi_barang["id_barang"] . "'>Info</button>
                        <button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#modal-hapus". $vi_barang["id_barang"] . "'>Hapus</button>
                        </td>
                    </tr>"; ?>
                    
                <!--
                ======================================================================================
                        SCRIPT UNTUK MENAMPILKAN MODAL VIEW
                ======================================================================================
                -->
                  <div class="modal fade" id="modal-notification<?php echo $vi_barang["id_barang"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">    
                        <div class="modal-header">
                          <h2 class="modal-title" id="modal-title-notification">ID - <?php echo $vi_barang["id_barang"] ?></h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                         </div>
                              
                         <div class="modal-body">          
                            <div class="py-3 text-center">
                              <h3>Nama : </h3><p><?php echo $vi_barang["nama_barang"] ?></p>
                              <h3>Harga : </h3><p><?php echo "Rp. ".$vi_barang["harga"]." ,-" ?></p>
                            </div>
                          </div>
                            <div class="modal-footer">
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
                <!--
                ======================================================================================
                        SCRIPT UNTUK MENAMPILKAN MODAL HAPUS
                ======================================================================================
                -->
                <div class="modal fade" id="modal-hapus<?php echo $vi_barang["id_barang"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-1-hapus" aria-hidden="true">
                  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">
                      <div class="modal-header">
                        <h2 class="modal-title" id="modal-1-hapus">HAPUS - <?php echo $vi_barang["id_barang"] ?></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="py-3 text-center">
                          <h3>Apakah anda yakin menghapus user : </h3><p><?php echo $vi_barang["nama_barang"] ?></p><br />
                        </div>    
                      </div>
                      <div class="modal-footer">
                      <a href="./hapus-barang.php?id=<?php echo $vi_barang['id_barang']; ?>"><button type="button" class="btn btn-white">HAPUS</button></a>
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
                

                

        <?php };
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