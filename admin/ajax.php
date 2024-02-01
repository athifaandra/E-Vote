<?php
define("BASEPATH", dirname(__FILE__));
session_start();

if (!isset($_SESSION['id_admin'])) {
    header('location:./');
}

include('../include/connection.php');

if (isset($_POST['periode'])) {
    $id_periode = $_POST['periode'];
} else {
    $periode_query = "SELECT nama_periode FROM t_periode WHERE tahun = YEAR(NOW())";
    $periode_result = $con->query($periode_query);

    if ($periode_result) {
        $id_periode = $periode_result->fetch_assoc()['nama_periode'];

        $get = $con->prepare("SELECT id_kandidat, nip_bpspegawai, nama, suara FROM t_kandidat WHERE id_periode = ?");
        $get->bind_param('s', $id_periode);
        $get->execute();
        $get->store_result();
        $get->bind_result($id_kandidat, $nip_bpspegawai, $nama, $suara);

        while ($get->fetch()) {
            ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="nama">
                            <span class="badge alert-success"><?php echo $nama; ?></span>
                        </div>
                        <div class="suara">
                            <span class="badge alert-success"><?php echo $suara; ?> Suara</span>
                        </div>
                        <div class="caption" style="text-align:center">
                            <h4><?php echo $nama; ?></h4>
                            <a href="?page=kandidat&action=edit&id=<?php echo $id_kandidat; ?>" class="btn btn-warning">Edit</a>
                            <a href="?page=kandidat&action=view&id=<?php echo $id_kandidat; ?>" class="btn btn-success">View</a>
                            <a href="?page=kandidat&action=hapus&id=<?php echo $id_kandidat; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kandidat ini ?')">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<div class="medium-8 medium-offset-2" style="padding-top:60px;">
            <div class="warning callout" style="padding: 30px 20px; text-align: center; color:#545252;">
                <h4>Tidak ada kandidat</h4>
            </div>
        </div>';
    }
}
?>
