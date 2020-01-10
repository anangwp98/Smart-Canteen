<div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Data Pesanan Saya</h3>
                  <hr>
                </div>
              </div>
              <div class="table-responsive">

            <?php
            $id_user = $_SESSION['id_user'];


            $data_user_pesanan = "SELECT * FROM `pemasanan`
            JOIN menu ON pemasanan.id_menu = menu.id_menu
            JOIN pedagang ON pedagang.id_pedagang = menu.id_pedagang
            JOIN user ON pemasanan.id_user = user.id_user
            WHERE user.id_user='$id_user' AND pemasanan.status='SELESAI'";
            $hasil_data_user_pesanan = mysqli_query($koneksi, $data_user_pesanan); 

            $total_record_data_user_pesanan = mysqli_num_rows($hasil_data_user_pesanan);
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
                  </tr>
                </thead>
                <tbody>
                <?php 
                
            if (($total_record_data_user_pesanan) > 0) {
              while($row1 = mysqli_fetch_assoc($hasil_data_user_pesanan)) {
                  echo "<tr>
                    <td>" . $row1["no_invoce"]."</td>
                    <td>" . $row1["nama"]."</td>
                    <td>".$row1["name_menu"]."</td>
                    <td>".$row1["jml_pesan"]."</td>
                    <td> Rp. ".$row1["total_bayar"].",- </td>
                    
                  </tr>"; ?>
                  
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