<?php
var_dump($_POST);
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

$id   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

$sql  = $con->prepare("SELECT * FROM t_pegawai WHERE nip_bpspegawai = ?") or die($con->error);
$sql->bind_param('s', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($nip_bpspegawai, $nip, $nama, $kode_org, $jabatan, $pangkat);
$sql->fetch();

?>
<h3>Update Data Pegawai</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="./user/update.php" method="post" class="form-horizontal">
      
            <div class="form-group">
                <label class="col-sm-2 control-label">NIP BPS</label>
                <div class="col-md-4">
                    <input class="form-control" type="number" name="nip_bps" placeholder="NIP BPS" value="<?php echo $nip_bpspegawai; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">NIP</label>
                <div class="col-md-4">
                    <input class="form-control" type="number" name="nip" placeholder="NIP" value="<?php echo $nip; ?>"/>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Pegawai</label>
                <div class="col-md-8">
                    <input class="form-control" name="nama" type="text" placeholder="Nama Pegawai" value="<?php echo $nama; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Kode Org</label>
                <div class="col-md-4">
                    <input class="form-control" type="number" name="kode_org" placeholder="Kode Org" type="number" value="<?php echo $kode_org; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-md-8">
                    <input class="form-control" name="jabatan" type="text" placeholder="Jabatan" value="<?php echo $jabatan; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">pangkat</label>
                <div class="col-md-8">
                    <input class="form-control" name="pangkat" type="text" placeholder="pangkat" value="<?php echo $pangkat; ?>"/>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="update" value="Update Pegawai" class="btn btn-success">Update Pegawai</button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">Kembali</button>
                </div>
            </div>
      
        </form>
    </div>
</div>
