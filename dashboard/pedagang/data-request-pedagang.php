<div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Data User</h3>
                  <hr>
                </div>
              </div>
              <div class="table-responsive">

            <?php
            $id_pedagang = $_SESSION['id_pedagang'];


            $data_pesanan = "SELECT * FROM `pemasanan`
            JOIN menu ON pemasanan.id_menu = menu.id_menu
            JOIN pedagang ON pedagang.id_pedagang = menu.id_pedagang
            JOIN user ON pemasanan.id_user = user.id_user
            WHERE pedagang.id_pedagang='$id_pedagang'";
            $hasil_data_pesanan = mysqli_query($koneksi, $data_pesanan); 

            $total_record_data_pesanan = mysqli_num_rows($hasil_data_pesanan);
            ?>
              <!-- Projects table -->
              <table id="tabel-data-user" class="table align-items-center">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Invoice</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                
            if (($total_record_data_pesanan) > 0) {
              while($row1 = mysqli_fetch_assoc($hasil_data_pesanan)) {
                  echo "<tr>
                    <td>" . $row1["no_invoce"]."</td>
                    <td>" . $row1["nama"]."</td>
                    <td>".$row1["name_menu"]."</td>
                    <td>".$row1["jml_pesan"]."</td>
                    <td>".$row1["total_bayar"]."</td><td scope='row'>
                    <button type='button' class='btn btn-outline-info' data-toggle='modal' data-target='#modal-notification". $row1["no_invoce"] . "'>Terima</button>
                    <button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#modal-hapus". $row1["no_invoce"] . "'>Hapus</button>
                    </td>
                  </tr>"; ?>
                  <!--
                ======================================================================================
                        SCRIPT UNTUK MENAMPILKAN MODAL HAPUS
                ======================================================================================
                -->
                <div class="modal fade" id="modal-hapus<?php echo $row1["no_invoce"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-1-hapus" aria-hidden="true">
                  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">
                      <div class="modal-header">
                        <h2 class="modal-title" id="modal-1-hapus">HAPUS <?php echo $row1["no_invoce"]; ?></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="py-3 text-center">
                          <h3>Apakah anda yakin menghapus pesanan : </h3><p><?php echo $row1["name_menu"] ?></p><br />
                        </div>    
                      </div>
                      <div class="modal-footer">
                      <a href="hapus-pesanan.php?id=<?php echo $row1["no_invoce"];?>"><button type="button" class="btn btn-white">HAPUS</button></a>
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
      </div>