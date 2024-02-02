 <?php
if (!isset($_SESSION['id_admin'])) {
    header('location: ../');
}
$id_periode = isset($_GET['id_periode']) ? $_GET['id_periode'] : '';


// Ambil nilai periode dari URL
?>
<div class="row">
    <div class="col-md-9">
        <h3>Daftar Kandidat</h3>
    </div>
    <div class="col-md-3" style="padding-top: 10px;">
        <!-- Tambahkan ID pada link untuk memudahkan pengambilan aksi pada JavaScript -->
        <a class="btn btn-primary" href="?page=kandidat&action=tambah" id="add_kandidat">Tambah Kandidat</a>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
    <div class="form-group">
    ```<label class="col-sm-2 control-label">Jenis Voting</label>
                <div class="col-md-3">
                    <!-- Pilihan periode akan diisi berdasarkan tahun yang dipilih -->
                    
                    <select name="periode" id="periode" class="form-control">
                        <option value="">-- Pilih Jenis Voting--</option>
                        <!-- <?php
                            include 'connection.php';
                            $query_periode = mysqli_query($con, "SELECT * FROM t_periode ORDER BY tahun ASC");
                            while ($periode = mysqli_fetch_assoc($query_periode)) {
                            echo "<option value='{$periode['id_periode']}'>{$periode['nama_periode']} - {$periode['tahun']}</option>";
                        }
    ?> -->
</select>
</div>
                <label class="col-sm-2 control-label">Periode</label>
                <div class="col-md-3">
                    <!-- Pilihan periode akan diisi berdasarkan tahun yang dipilih -->
                    
                    <select name="periode" id="periode" class="form-control">
                        <option value="">-- Pilih Periode--</option>
                        <?php
                            include 'connection.php';
                            $query_periode = mysqli_query($con, "SELECT * FROM t_periode ORDER BY tahun ASC");
                            while ($periode = mysqli_fetch_assoc($query_periode)) {
                            echo "<option value='{$periode['id_periode']}'>{$periode['nama_periode']} - {$periode['tahun']}</option>";
                        }
    ?>
</select>
</div>
    <div style="clear:both"></div>
    <br />
    <div class="col-md-12">
        <div id="data">
        </div>
    </div>
</div>

<script>
    // Tambahkan event listener untuk tombol "Tambah Kandidat"
    document.getElementById('add_kandidat').addEventListener('click', function () {
        var selectedPeriode = document.getElementById('periode').value;

        // Periksa apakah periode sudah dipilih
        if (selectedPeriode !== '') {
            // Redirect ke halaman tambah kandidat dengan parameter id_periode
            window.location.href = "?page=kandidat&action=tambah&id_periode=" + selectedPeriode;
        } else {
            alert("Pilih periode terlebih dahulu!");window.history.go(-1);
            
        }
    });
</script>
                  

