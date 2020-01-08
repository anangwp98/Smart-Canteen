 <!-- Page content -->
 <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Menu</h3>
                  <hr>
                  <label for="total_pesan" class="h4 mb-0 text-black text-uppercase d-none d-lg-inline-block teks-total-pesan">Total : Rp. 0,- </label>
                </div>
              </div>
              <div class="table-responsive">

            <?php

            $data_menu = "SELECT * FROM menu 
            JOIN pedagang ON pedagang.id_pedagang = menu.id_pedagang";
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
                    <th scope="col">Pedagang</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php 
                
            if (($total_record_menu) > 0) {
              while($row = mysqli_fetch_assoc($hasil_menu)) {
                  echo "<tr>
                    <th scope='row'>" . "GAMBAR MENU" . "</th>
                    <td>" . $row["name_menu"]."</td>
                    <td>".$row["harga"]."</td>
                    <td>".$row["nama"]."</td>
                    <td scope='row'>
                      <button type='button' class='btn btn-outline-info' data-toggle='modal' data-target='#modal-notification". $row["id_menu"] . "'>Pilih</button>
                    </td>
                  </tr>"; ?>
                  
                <!--
                ======================================================================================
                        SCRIPT UNTUK MENAMPILKAN MODAL VIEW
                ======================================================================================
                -->
                <form action="input-pesanan.php" method="post">
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
                            <input class="form-control" type="hidden" name="harga" value="<?php echo $row['harga'] ?>">
                            <input class="form-control" type="hidden" name="id_menu" value="<?php echo $row['id_menu'] ?>">
                            <input class="form-control" placeholder="Qty" type="text" name="jml_pesan">
                            <button type="submit" class="btn btn-white" name="simpan_pesanan">Masukkan Pesanan Saya</button>
                            <button type="button" class="btn btn-link  ml-auto"  data-dismiss="modal">Close</button> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
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
    </div>
