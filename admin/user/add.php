<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if(isset($_POST['add_user'])) {
    
    $nip_bps = trim(htmlspecialchars($_POST['nip_bps']));
    $nip = trim(htmlspecialchars($_POST['nip']));
    $nama = trim(htmlspecialchars($_POST['nama']));
    $kode_org = trim(htmlspecialchars($_POST['kode_org']));
    $jabatan = trim(htmlspecialchars($_POST['jabatan']));
    $pangkat = trim(htmlspecialchars($_POST['pangkat']));
    // $jk   = $_POST['jk'];
    // $kls  = $_POST['kelas'];
   //cek nip
   $get_id = $con->prepare("SELECT * FROM t_pegawai WHERE nip_bpspegawai = ?");
   $get_id->bind_param('s', $nip_bps);
   $get_id->execute();
   $get_id->store_result();
   $numb = $get_id->num_rows();
   //validasi
   if($nip_bps == '' ||$nip == '' || $nama == '' || $kode_org == '' || $jabatan == ''|| $pangkat == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");</script>';

   } else if(!preg_match("/^[a-zA-z \'.]*$/",$nama)) {

      echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, titik(.), petik tunggal");</script>';

   } else if($numb > 0){

      echo '<script type="text/javascript">alert("NIP BPS SUDAH ADA, tidak dapat digunakan");window.history.go(-2);</script>';

   } else {

      $sql = $con->prepare("INSERT INTO t_pegawai(nip_bpspegawai, nip, nama, kode_org, jabatan, pangkat) VALUES(?, ?, ?, ?, ?, ?)");
      $sql->bind_param('ssssss', $nip_bps ,$nip, $nama, $kode_org, $jabatan, $pangkat);
      $sql->execute();

      header('location: ?page=user');

   }

}
?>
<h3>Tambah Data Pegawai</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal">

            <div class="form-group">
                <label class="col-sm-2 control-label">NIP BPS</label>
                <div class="col-md-4">
                    <input class="form-control" type="number" name="nip_bps" placeholder="NIP BPS" type="number"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">NIP</label>
                <div class="col-md-4">
                    <input class="form-control" type="number" name="nip" placeholder="NIP" type="number"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Pegawai</label>
                <div class="col-md-8">
                    <input class="form-control" name="nama" type="text" placeholder="Nama Pegawai"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Kode Org</label>
                <div class="col-md-4">
                    <input class="form-control" type="number" name="kode_org" placeholder="Kode Org" type="number"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-md-8">
                    <input class="form-control" name="jabatan" type="text" placeholder="Jabatan"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">pangkat</label>
                <div class="col-md-8">
                    <input class="form-control" name="pangkat" type="text" placeholder="pangkat"/>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="add_user" value="Tambah User" class="btn btn-success">Tambah Pegawai</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>
