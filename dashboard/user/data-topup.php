
    <?php include('../koneksi.php') ?>
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">History Topup</h3>
                  <hr>
                </div>
              </div>
              <div class="table-responsive">

            <?php
            $id_user = $_SESSION['id_user'];
            $data_topup_user = "SELECT topup.id_topup, user.nama, topup.jml_topup,  DATE_FORMAT(topup.tgl_topup, '%M %d %Y. Pukul  %H:%i:%s') as tanggal_topup FROM `topup` JOIN user ON topup.id_user=user.id_user WHERE user.id_user='$id_user' AND topup.status=''";
            $hasil_topup_user = mysqli_query($koneksi, $data_topup_user); 

            $total_record_topup_user = mysqli_num_rows($hasil_topup_user);


            $data_topup_selsai = "SELECT topup.id_topup, user.nama, topup.jml_topup,  DATE_FORMAT(topup.tgl_topup, '%M %d %Y. Pukul  %H:%i:%s') as tanggal_topup FROM `topup` JOIN user ON topup.id_user=user.id_user WHERE user.id_user='$id_user' AND topup.status='SELESAI'";
            $hasil_topup_selesai = mysqli_query($koneksi, $data_topup_selsai); 

            $total_record_topup_selesai = mysqli_num_rows($hasil_topup_selesai);
            ?>
              <!-- Projects table -->
              <table id="tabel-data-user" class="table align-items-center">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah Top Up</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                
            if (($total_record_topup_user) > 0) {
              while($row = mysqli_fetch_assoc($hasil_topup_user)) {
                  echo "<tr>
                    <th scope='row'>" . $row["nama"]. "</th>
                    <td> Rp. " . $row["jml_topup"].",-</td>
                    <td> " . $row["tanggal_topup"]."</td>
                    <td>
                    <button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#modal-hapus". $row["id_topup"] . "'>PENDING  </button </td>
                  </tr>"; ?>
                
                <!--
                ======================================================================================
                        SCRIPT UNTUK MENAMPILKAN MODAL HAPUS
                ======================================================================================
                -->
                <div class="modal fade" id="modal-hapus<?php echo $row["id_topup"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-1-hapus" aria-hidden="true">
                  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">
                      <div class="modal-header">
                        <h2 class="modal-title" id="modal-1-hapus">HAPUS - <?php echo $row["id_topup"] ?></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="py-3 text-center">
                          <h3>Yakin anda menghapus topup anda dengan jumlah : </h3><p><?php echo "Rp. ".$row["jml_topup"]." ,-" ?></p><br />
                        </div>    
                      </div>
                      <div class="modal-footer">
                      <a href="hapus-topup.php?id=<?php echo $row['id_topup']; ?>"><button type="button" class="btn btn-white">HAPUS</button></a>
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
            } else if (($total_record_topup_selesai) > 0) {
              while($row = mysqli_fetch_assoc($hasil_topup_selesai)) {
                  echo "<tr>
                    <th scope='row'>" . $row["nama"]. "</th>
                    <td> Rp. " . $row["jml_topup"].",-</td>
                    <td> " . $row["tanggal_topup"]."</td>
                    <td>
                    <button type='button' class='btn btn-outline-success' data-toggle='modal' data-target='#modal-view". $row["id_topup"] . "'>SELESAI</button </td>
                  </tr>"; ?>
                  
                <!--
                ======================================================================================
                        SCRIPT UNTUK MENAMPILKAN MODAL VIEW
                ======================================================================================
                -->
                  <div class="modal fade" id="modal-view<?php echo $row["id_topup"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-view" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">    
                        <div class="modal-header">
                          <h2 class="modal-title" id="modal-title-notification">ID - <?php echo $row["id_topup"] ?></h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                         </div>
                              
                         <div class="modal-body">          
                            <div class="py-3 text-center">
                              <h3>Nama : </h3><p><?php echo $row["nama"] ?></p>
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
            <?php }
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
    </div>