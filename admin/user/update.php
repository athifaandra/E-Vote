<?php
var_dump($_POST);
if (!isset($_POST['update'])) {

   header('location: ../');

} else {
   define('BASEPATH', dirname(__FILE__));

   include('../../include/connection.php');
   
   // $nip_bps = $_POST ['nip_bps'];
   // $nip  = $_POST['nip'];
   // $nama = $_POST['nama'];
   // $kode_org = $_POST['kode_org'];
   // $jabatan = $_POST['jabatan'];
   // $pangkat = $_POST['pangkat'];
$nip_bps = trim(htmlspecialchars($_POST['nip_bps']));
$nip = trim(htmlspecialchars($_POST['nip']));
$nama = trim(htmlspecialchars($_POST['nama']));
$kode_org = trim(htmlspecialchars($_POST['kode_org']));
$jabatan = trim(htmlspecialchars($_POST['jabatan']));
$pangkat = trim(htmlspecialchars($_POST['pangkat']));

$get_id = $con->prepare("SELECT * FROM t_pegawai WHERE nip_bpspegawai = ?");
$get_id->bind_param('s', $nip_bps);
$get_id->execute();
$get_id->store_result();
$numb = $get_id->num_rows();

   if($nip_bps == ''||$nip == ''||$nama == ''||$kode_org == ''||$jabatan == ''||$pangkat == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else if (!preg_match("/^[a-zA-Z,.'\s]*$/", $nama)) {
      echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, koma (,), titik(.), petik tunggal"); window.history.go(-1);</script>';

   }  else if($numb > 0){

      echo '<script type="text/javascript">alert("Data sudah ada, tidak dapat digunakan");window.history.go(-2);</script>';

   }else {

      $sql = $con->prepare("UPDATE t_pegawai SET nip_bpspegawai = ?, nip = ?, nama = ?, kode_org = ?, jabatan = ?, pangkat = ? WHERE nip_bpspegawai = ?");
      $sql->bind_param('sssssss', $nip_bps, $nip, $nama, $kode_org, $jabatan, $pangkat, $nip_bps);
      $sql->execute();

      header('location:../dashboard.php?page=user');

   }

}

?>
