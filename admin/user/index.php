<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./user/add.php');
         break;

      case 'edit':
         include('./user/edit.php');
         break;


      case 'hapus':

         if (isset($_GET['id'])) {

            $nip_bps   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

            $sql   = $con->prepare("DELETE FROM t_pegawai WHERE nip_bpspegawai = ?");
            $sql->bind_param('s', $nip_bps);
            $sql->execute();

            header('location: ?page=user');

         } else {

            header('location: ./');

         }

         break;
      default:
         include('./user/list.php');
         break;
   }

} else {

   include('./user/list.php');

}
?>
