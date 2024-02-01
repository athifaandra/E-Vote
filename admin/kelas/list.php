<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>
<div class="col-md-9">
   <h3>Daftar Periode</h3>
</div>
<div class="col-md-3" style="padding-top:10px;">
   <a class="btn btn-primary" href="?page=kelas&action=tambah">Tambah Periode</a>
</div>
<div style="clear:both"></div>
<hr />
<div class="row">
   <div class="col-md-8">
      <table class="table table-striped">
         <thead>
            <tr>
               <th width="80px"  style="text-align:center;">#</th>
               <th width="300px" style="text-align:center;">Periode</th>
               <th width="100px" style="text-align:center;">tahun</th>
               <th width="150px" style="text-align:center;">Jumlah Pegawai</th>
               <th width="200px" style="text-align:center;">Opsi</th>
            </tr>
         </thead>
         <tbody>
            <?php
            require('../include/connection.php');
            $sql = mysqli_query($con, "SELECT a.*, (SELECT COUNT(id_periode) FROM t_kandidat WHERE id_periode = a.id_periode) AS jumlah FROM t_periode a ORDER BY a.id_periode ASC");

            if (mysqli_num_rows($sql) > 0) {

               while($data = mysqli_fetch_array($sql)) {
                  ?>
                  <tr>
                     <td style="text-align:center; vertical-align:middle">
                        <?php echo $data['id_periode']; ?>
                     </td>
                     <td style="text-align:center; vertical-align:middle">
                        <?php echo $data['nama_periode']; ?>
                     </td>
                     <td style="text-align:center; vertical-align:middle">
                        <?php echo $data['tahun']; ?>
                     </td>
                     <td style="text-align:center; vertical-align:middle">
                        <?php echo $data['jumlah']; ?> Pegawai
                     </td>
                     <td style="text-align:center;">
                        <a href="?page=kelas&action=edit&id=<?php echo $data['id_periode']; ?>" class="btn btn-warning btn-sm">
                           Edit
                        </a>
                        <a href="?page=kelas&action=hapus&id=<?php echo $data['id_periode']; ?>" onclick="return confirm('Yakin ingin menghapus kelas ini ?');" class="btn btn-danger btn-sm">
                           Hapus
                        </a>
                     </td>
                  </tr>
                  <?php
               }
            } else {

               echo "<tr>
                        <td colspan='4' style='text-align:center;'><h4>Belum ada data</h4></td>
                     </tr>";
            }
            ?>
         </tbody>
      </table>
   </div>
</div>
