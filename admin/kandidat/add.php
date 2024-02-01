<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>
<div class="row">
   <div class="col-md-9 col-sm-9">
      <h3>Tambah Calon Kandidat</h3>
   </div>

   <div style="clear:both"></div>
   <hr />
   <div class="col-md-12 col-sm-15">
      <table class="table table-striped table-hover">
            <thead>
                  <tr>
                  <th class= "nomor" style="text-align:center;">#</th>
                  <th style="text-align:center;">NIP BPS</th>
                  <th style="text-align:center;">NIP</th>
                  <th class="nama" style="text-align:center;">Nama Pegawai</th>
                  <th style="text-align:center;">Kode Org</th>
                  <th style="text-align:center;">Pangkat/Gol.ruang</th>
                  <th style="text-align:center">Jabatan</th>
                  <!-- <th width="130px" style="text-align:center;">Jenis Kelamin</th> -->
                  <th width="200px" style="text-align:center;">Opsi</th>
                  </tr>
            </thead>
            <tbody>
                  <?php
                  require('../include/connection.php');

                  if (isset($_GET['hlm'])) {
                              $hlm = $_GET['hlm'];
                              $no  = (5*$hlm) - 4;
                        } else {
                              $hlm = 1;
                              $no  = 1;
                        }
                  $start  = ($hlm - 1) * 5;

                  // $sql = mysqli_query($con, "SELECT * FROM t_user JOIN t_kelas ON t_user.id_kelas = t_kelas.id_kelas LIMIT $start,5");
                  $sql = mysqli_query($con, "SELECT * FROM t_pegawai");
                  if (mysqli_num_rows($sql) > 0) {

                  $i = 1;
                  while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $no++; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['nip_bpspegawai']; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['nip']; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['nama']; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['kode_org']; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['jabatan']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['pangkat']; ?>
                        </td>
                        <!-- <td style="text-align:center;vertical-align:middle;">
                              <?php
                              if($data['jk'] == 'L') {
                                    echo 'Laki - laki';
                              } else {
                                    echo 'Perempuan';
                              }
                              ?>
                        </td> -->
                        <td style="text-align:center;vertical-align:middle;">
                        <button type="submit" name="tambah_kandidat" value="Tambah Kandidat" class="btn btn-success">
                        Tambah Kandidat</button>
                        </td>
                        </tr>
                        <?php
                  }

                  } else {

                  echo "<tr>
                              <td colspan='9' style='text-align:center;'><h4>Belum ada data</h4></td>
                        </tr>";
                  }
                  ?>
            </tbody>
      </table>
      <?php
      echo '<ul class="pagination">';
         if($hlm > 1){ //start if
            $hlmn = $hlm - 1;
      ?>
            <li class="waves-effect">
               <a href="?page=user&hlm=<?php  echo $hlmn; ?>">
                  <i class='fa fa-caret-left'></i> Prev
               </a>
            </li>
      <?php
         }		//end if $hlm > 1


         $hitung = mysqli_num_rows(mysqli_query($con, "SELECT * FROM t_pegawai"));
         $queryCountRows = "SELECT COUNT(*) AS total_rows FROM t_pegawai";
            $resultCountRows = mysqli_query($con, $queryCountRows);

      if ($resultCountRows) {
      $rowCount = mysqli_fetch_assoc($resultCountRows);
      $totalRows = $rowCount['total_rows'];
      } else {
      $totalRows = 0; // Atur ke 0 jika terjadi kesalahan
      }

         $total  = ceil($hitung/$totalRows);
         for ($i = 1; $i <= $total ; $i++) { //start for
      ?>
            <li <?php if ($hlm != $i) { echo 'class="waves-effect"'; } else { echo 'class="active"'; } ?>>
               <a href="?page=user&hlm=<?php  echo $i; ?>">
                  <?php  echo $i; ?>
               </a>
            </li>
         <?php
         } // end for

         if ($hlm < $total) { //start if $hlm < $total
            $next = $hlm + 1;
         ?>
            <li class="waves-effect">
               <a href="?page=user&hlm=<?php  echo $next; ?>">
                  Next <i class='fa fa-caret-right'></i>
               </a>
            </li>
         <?php
         }	//end if $hlm < $total

      echo '</ul>';	//end pagination
      ?>
      </div>
</div>

<!-- <div class="row">
    <div class="col-md-8">
        <form action="./kandidat/simpan.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Kandidat</label>
                <div class="col-md-6">
                    <input type="text" name="nama" class="form-control" required="Nama" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Foto Kandidat</label>
                <div class="col-md-5">
                    <input type="file" name="foto" class="form-control" required="Foto"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Visi</label>
                <div class="col-md-8">
                    <textarea name="visi" rows="3" class="form-control" required="Visi"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Misi</label>
                <div class="col-md-8">
                    <textarea name="misi" rows="3" required="Misi" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group" style="padding-top:20px;">
                <div class="col-md-offset-3 col-md-8">
                    <button type="submit" name="add_kandidat" value="Tambah Kandidat" class="btn btn-success">
                        Tambah Kandidat
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
                </div>
            </div>

        </form>
    </div>
</div> -->


