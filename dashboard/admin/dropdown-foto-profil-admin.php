
                <?php
		            	$id_user_admin = $_SESSION['id_user'];
                  $sqlImg = "SELECT * FROM profil_img WHERE id_user='$id_user_admin'";
                  $resultImg = mysqli_query($koneksi, $sqlImg);
                 
                  while ($rowimg = mysqli_fetch_assoc($resultImg)) {
                    echo "<span class='avatar avatar-sm rounded-circle'>";
                      if ( $rowimg['status'] > 0) {
                        echo "<img src='../assets/img/profil-user/".$rowimg['status']."' class='rounded-circle'>";
                      } else {
                        echo "BELUM ADA FOTO";
                      }
                    echo "</span>";
                  }
                  ?>