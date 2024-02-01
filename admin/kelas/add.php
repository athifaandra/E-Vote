<?php
if (isset($_POST['add_periode'])) {

   $id      = $_POST['id'];
   $periode   = $_POST['periode'];
   $tahun       =$_POST['tahun'];

   if ($id == null || $periode == null || $tahun == null) {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else {

      $sql = $con->prepare("INSERT INTO t_periode(id_periode, nama_periode, tahun) VALUES ( ?, ?, ?)");
      $sql->bind_param('sss', $id, $periode, $tahun);
      $sql->execute();

      header('location:?page=kelas');
   }
}

if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

$id = mysqli_query($con, "SELECT id_periode FROM t_periode ORDER BY id_periode DESC LIMIT 1");

if (mysqli_num_rows($id) > 0) {
   $key        = mysqli_fetch_array($id);
   $get        = (intval(substr($key['id_periode'], 1))) + 1;
   $id_periode   = "P".sprintf("%02d", $get);
} else {
   $id_periode = 'P01';
}

?>
<h3>Tambah Periode</h3>
<hr />
<div class="row">
    <div class="col-md-4">
        <form action="" method="post">

            <div class="form-group">
                <label>Id Periode</label>
                <input class="form-control" type="text" name="id" readonly value="<?php echo $id_periode; ?>" />
            </div>

            <div class="form-group">
                <label>Nama Periode</label>
                <input class="form-control" name="periode" type="text" placeholder="Periode" />
            </div>

            <div class="form-group">
                <label>tahun</label>
                <input class="form-control" name="tahun" type="number" placeholder="Tahun" />
            </div>

            <div class="form-group">
                <button type="submit" name="add_periode" value="Tambah Periode" class="btn btn-success">
                    Tambah Periode
                </button>
                <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                    Kembali
                </button>
            </div>

        </form>
    </div>
</div>
