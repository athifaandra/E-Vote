<?php
define('BASEPATH', dirname(__FILE__));
if (!isset($_POST['tambah_kandidat'])) {

   header('location:../');

} else {
   $nip_bps = $_POST['nip_bps'];
   $nip = $_POST['nip'];
   $nama = $_POST['nama'];
   $kode_org = $_POST['kode_org'];
   $jabatan = $_POST['jabatan'];
   $pangkat = $_POST['pangkat'];
   $foto     = $_FILES['foto'];
   $periode  = $_POST['periode'];

               include('../../include/connection.php');

               $sql = $con->prepare("INSERT INTO t_kandidat(nip_bpspegawai, nama, id_periode) VALUES(?, ?, ?)") or die($con->error);
               $sql->bind_param('sss', $nip_bps, $nama, $periode);
               $sql->execute();

               if ($sql) {
                  echo "Kandidat berhasil ditambahkan!";
              } else {
                  echo "Gagal menambahkan kandidat: " . mysqli_error($con);
              }

               header('location:../dashboard.php?page=kandidat');


   }


?>
