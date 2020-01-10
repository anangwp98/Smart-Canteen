<!-- Page content -->
<?php
$id_detail_topup = $_GET['id'];

$query_mysql_view_domet_admin = mysqli_query($koneksi, 
    "SELECT dompet.id_dompet AS 'id_dompet_admin' from dompet
    JOIN user on user.id_user=dompet.id_user WHERE user.id_user='$_SESSION[id_user]'");
while ($data_dompet_admin = mysqli_fetch_array($query_mysql_view_domet_admin)){ 

$query_mysql_view_detail_topup = mysqli_query($koneksi, 
    "SELECT topup.id_topup, topup.jumlah_topup, topup.keterangan_topup, DATE_FORMAT(topup.tanggal_topup, '%D %M %Y - %H:%i:%s') AS 'tanggal_topup', users.nama, users.id AS 'user_id', dompet.saldo, dompet.id_dompet
    FROM topup 
    JOIN users ON topup.id_user=users.id 
    JOIN dompet ON dompet.id_user=users.id WHERE topup.id_topup='$id_detail_topup'");
while($data_detail_topup = mysqli_fetch_array($query_mysql_view_detail_topup)){

?>
<div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">ID - <?php echo $data_detail_topup['id_topup'] ?></h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="./proses-update.php" method="POST">
                <h6 class="heading-small text-muted mb-4">Informasi Top Up</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama User</label>
                        <input class="form-control form-control-alternative" type="hidden" name="id" value="<?php echo $data_detail_topup['id_topup'] ?>">
                        
                        <input class="form-control form-control-alternative" type="hidden" name="id_dompet_admin" value="<?php echo $data_dompet_admin['id_dompet_admin'] ?>">
                        <input class="form-control form-control-alternative" type="hidden" name="id_dompet_user" value="<?php echo $data_detail_topup['id_dompet'] ?>">
                        <input class="form-control form-control-alternative" type="hidden" name="nama" value="<?php echo $data_detail_topup['nama']; ?>">
                        <input class="form-control form-control-alternative" disabled value="<?php echo $data_detail_topup['nama']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Tanggal Topup</label>
                        <input class="form-control form-control-alternative" type="hidden" name="tgl" value="<?php echo $data_detail_topup['tanggal_topup']; ?>">
                        <input class="form-control form-control-alternative" disabled value="<?php echo $data_detail_topup['tanggal_topup']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Jumlah </label>
                        <input class="form-control form-control-alternative" type="hidden" name="jml_topup" value="<?php echo $data_detail_topup['jumlah_topup'] ?>">
                        
                        <input class="form-control form-control-alternative" disabled value="<?php echo "Rp. ".$data_detail_topup['jumlah_topup'] . ",-" ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Keterangan </label>
                        <input class="form-control form-control-alternative"  type="hidden" name="keterangan" value="<?php echo $data_detail_topup['keterangan_topup'] ?>">
                        <input class="form-control form-control-alternative" disabled value="<?php echo $data_detail_topup['keterangan_topup'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Saldo Sebelumnya </label>
                        <input class="form-control form-control-alternative" type="hidden" name="saldo" value="<?php echo $data_detail_topup['saldo']?>">
                        <input class="form-control form-control-alternative" disabled value="<?php echo "Rp. ".$data_detail_topup['saldo'] . ",-" ?>">
                      </div>
                    </div>
                </div>
                
                <hr class="my-4" />
                <button class="btn btn-icon btn-3 btn-primary" type="submit" name="prosesTopUp">
                    <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                    <span class="btn-inner--text">Proses</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      <?php } }?>