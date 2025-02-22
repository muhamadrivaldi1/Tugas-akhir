<?php 
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        // $id_pasien = $_GET['id_pasien'];
        mysqli_query($conn,"DELETE FROM tbl_gejala WHERE id_gejala='$id_gejala'");
        header("location:gejala.php");
    }
}

include 'header.php';
?>

<div class="container">
    <div class="card shadow p-5 mb-5">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Gejala</h5>
        </div>

        <div class="card-body">
            <a href="gejala-simpan.php" class="btn btn-primary"><span class="fa fa-plus">
            </span>&nbsp; Tambah Data</a>
            <br>
            <br>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Gejala</th>
                        <th class="text-center">Nilai</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    <?php
                    $gejala = mysqli_query($conn, "SELECT * FROM tbl_gejala ORDER BY id_gejala");
                    $no=1;
                    while ($a = mysqli_fetch_array($gejala)) { ?>
                    <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?=$a['gejala']?></td>
                    <td class="text-center"><?=$a['nilai']?></td>
                    <td class="text-center">
                        <a href="gejala.php?id_gejala=<?= $a['id_gejala']?>"
                        class="btn btn-secondary"><span class="fa fa-pen"></span>
                    </a>
                        <a href="gejala.php?id_gejala=<?= $a['id_gejala']?>&
                        aksi=hapus" class="btn btn-danger"><span class="fa fa-trash"></span>
                    </a>
                    </td>
                    </tr>
                    <?php }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>

