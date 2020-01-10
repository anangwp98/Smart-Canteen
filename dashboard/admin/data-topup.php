<div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Data Top Up</h3>
                  <hr>
                </div>
              </div>
              <div class="table-responsive">

            <?php

            $data_link = "SELECT 
            
            topup.id_topup, user.nama, topup.jml_topup, DATE_FORMAT(topup.tgl_topup, '%D %M %Y - %H:%i:%s') AS 'tanggal_topup' FROM topup 
            
            JOIN user ON user.id_user=topup.id_user 
            WHERE topup.status=''";
            $hasil_link = mysqli_query($koneksi, $data_link); 

            $total_record_link = mysqli_num_rows($hasil_link);
            
            $data_cek_dompet_admin = "SELECT user.id_user, user.nama, dompet.id_dompet, dompet.saldo FROM user JOIN dompet ON user.id_user=dompet.id_user WHERE user.id_user='$_SESSION[id_user]'";
            $hasil_cek_dompet_admin = mysqli_query($koneksi, $data_cek_dompet_admin);
            
            $total_record_cek_dompet_admin = mysqli_num_rows($hasil_cek_dompet_admin);
            if (($total_record_cek_dompet_admin) > 0) {
                while($row_cek_dompet_admin = mysqli_fetch_assoc($hasil_cek_dompet_admin)) {
                    $data_cek_dompet_admin = $row_cek_dompet_admin['saldo'];
                }
            } else {
                $data_cek_dompet_admin = 0;
            }

            $data_cek_dompet_user = "SELECT user.id_user, user.nama, dompet.id_dompet, dompet.saldo FROM user JOIN dompet ON user.id_user=dompet.id_user WHERE user.level='user'";
            $hasil_cek_dompet_user = mysqli_query($koneksi, $data_cek_dompet_user);
            
            $total_record_cek_dompet_user = mysqli_num_rows($hasil_cek_dompet_user);
           

            $hasil_link = mysqli_query($koneksi, $data_link); 

            $total_record_link = mysqli_num_rows($hasil_link);
            ?>
              <!-- Projects table -->
              <table id="tabel-data-user" class="table align-items-center">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Dompet</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
             if (($total_record_cek_dompet_user) > 0) {
                while($row_cek_dompet_user = mysqli_fetch_assoc($hasil_cek_dompet_user)) {
                if (($total_record_link) > 0) {
                    while($row = mysqli_fetch_assoc($hasil_link)) {
                        echo "
                        <form action='proses.php' method='POST'>
                        <tr>
                        <th scope='row'>" . $row["id_topup"]. "</th>
                        <td>" . $row["nama"]."</td>
                        <td>". $row_cek_dompet_user['id_dompet']."</td>
                        <td>".$row["jml_topup"]."</td>
                        
                        <td>".$row["tanggal_topup"]."</td>
                        <td scope='row'>
                        <button type='button' class='btn btn-outline-primary' data-toggle='modal' data-target='#modal-view-topup". $row["id_topup"] . "'>Proses</button>
                            <button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#modal-hapus-topup". $row["id_topup"] . "'>Hapus</button>
                        </td>
                        </tr>
                        </form>"; 
                ?>
                   
                <div class="modal fade" id="modal-view-topup<?php echo $row["id_topup"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-1-hapus" aria-hidden="true">
                <form action="./proses.php" method="post">
                  <div class="modal-dialog modal-primary modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-primary">
                      <div class="modal-header">
                        <h2 class="modal-title" id="modal-1-hapus">PROSES - <?php echo $row["id_topup"] ?></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="py-3 text-center">
                        
                            <input type="text" name="id_dompet_user" value="<?php echo $row_cek_dompet_user['id_dompet'] ?>" hidden>
                            <input type="text" name="jml_saldo_admin" value="<?php echo $data_cek_dompet_admin["saldo"] ?>" hidden >
                            <input type="text" name="nama" value="<?php echo $row["nama"] ?>" hidden >
                            <input type="text" name="tgl" value="<?php echo $row["tanggal_topup"] ?>" hidden >
                            <input type="text" name="id_topup" value="<?php echo $row["id_topup"] ?>" hidden>
                            
                            <input type="text" name="saldo" value="<?php echo $row_cek_dompet_user["saldo"] ?>" hidden>
                            
                            <input type="text" name="jml_topup" value="<?php echo $row["jml_topup"]; ?>" hidden>
                          <h3>Yakin anda proses Top Up sebesar : </h3><p>Rp. <?php echo $row["jml_topup"] ?> ,-</p><br />
                        </div>    
                      </div>
                      <div class="modal-footer">
                        <button type="sumbit" name="updateTopup" class="btn btn-white">Proses Top Up</button></a>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batal</button> 
                      </div> 
                    </div>
                  </div>
                  </form>
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
                <div class="modal fade" id="modal-hapus-topup<?php echo $row["id_topup"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-1-hapus" aria-hidden="true">
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
                          <h3>Yakin anda menghapus link : </h3><p><?php echo $row["nama"] ?></p><br />
                        </div>    
                      </div>
                      <div class="modal-footer">
                      <a href="./hapus-topup.php?id=<?php echo $row['id_topup']; ?>"><button type="button" class="btn btn-white">HAPUS</button></a>
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
                }
            }
        }

            ?>
                
     
                
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
        </div>