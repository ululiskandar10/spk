<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Gejala - Naive Bayes (NB)";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'functions.php';

$user = $_SESSION["username"];
$query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user'");
$admin = mysqli_fetch_assoc($query);
require 'layouts/sidebar.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Latih</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Latih</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-secondary">
                <div class="row">
                    <div class="col">
                        <a href="add_datalatih.php" class="btn btn-primary ml-2 mt-3 mb-3">
                            Tambah Data Latih
                        </a>
                        <div class="col-12">
                            <table class="table table-bordered table-hover" id="tableDataLatih" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Usia</th>
                                        <th>Kemandirian</th>
                                        <th>Kesiapan</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM tb_data");
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row[1]; ?></td>
                                        <td><?= $row[2]; ?></td>
                                        <td><?= $row[3]; ?></td>
                                        <td><?= $row[9]; ?></td>
                                        <td><?= $row[10]; ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailModal<?= $row[0]; ?>"><i class="fas fa-eye"></i> </a>
                                            <a class="btn btn-success btn-sm ubah" data-toggle="modal" data-target="#EditModal<?= $row[0]; ?>"><i class="fas fa-edit"></i> </a>
                                            <a class="btn btn-danger btn-sm hapus_datalatih" href="data_latih/hapus.php?id=<?= $row[0]; ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Detail Modal -->
                                    <div class="modal fade" id="DetailModal<?= $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="#DetailModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="DetailModalLabel">Detail Data
                                                        <strong><?= $row[1]; ?></strong>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="motorik_kasar">Motori Kasar</label>
                                                                <input type="text" autocomplete="off" class="form-control" id="motorik_kasar" name="motorik_kasar" value="<?= $row[4]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="motorik_halus">Motori Halus</label>
                                                                <input type="text" autocomplete="off" class="form-control" id="motorik_halus" name="motorik_halus" value="<?= $row[5]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="kognitif_anak">Kognitif Anak</label>
                                                                <input type="text" autocomplete="off" class="form-control" id="kognitif_anak" name="kognitif_anak" value="<?= $row[6]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="kemandirian">Kemandirian</label>
                                                                <input type="text" autocomplete="off" class="form-control" id="kemandirian" name="kemandirian" value="<?= $row[9]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="kompetensi_dasar_akhlak">Kompetensi Dasar Akhlak
                                                                    Perilaku Sosial Emosi</label>
                                                                <input type="text" autocomplete="off" class="form-control" id="kompetensi_dasar_akhlak" name="kompetensi_dasar_akhlak" value="<?= $row[7]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="kompetensi_dasar_umum">Kompetensi Umum</label>
                                                                <input type="text" autocomplete="off" class="form-control" id="kompetensi_dasar_umum" name="kompetensi_dasar_umum" value="<?= $row[8]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="kesiapan">Kesiapan</label>
                                                                <input type="text" autocomplete="off" class="form-control" id="kesiapan" name="kesiapan" value="<?= $row[10]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembail</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="EditModal<?= $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="#EditModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="EditModalLabel">Ubah Data
                                                        <strong><?= $row[1]; ?></strong>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="data_latih/ubah.php" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $row[0]; ?>">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="usia">Usia</label>
                                                                    <input type="text" autocomplete="off" class="form-control" id="usia" name="usia" value="<?= $row[3]; ?>" placeholder="Nama Kondisi">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="motorik_kasar">Motorik Kasar</label>
                                                                    <select class="form-control" name="motorik_kasar" id="motorik_kasar">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Motorik Kasar'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[4] == $kriteria[2]) echo 'selected="selected"'; ?>>
                                                                                <?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="motorik_halus">Motorik Halus</label>
                                                                    <select class="form-control" name="motorik_halus" id="motorik_halus">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Motorik Halus'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[5] == $kriteria[2]) echo 'selected="selected"'; ?>>
                                                                                <?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kognitif_anak">Kognitif Anak</label>
                                                                    <select class="form-control" name="kognitif_anak" id="kognitif_anak">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kognitif Anak'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[6] == $kriteria[2]) echo 'selected="selected"'; ?>>
                                                                                <?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="kompetensi_dasar_akhlak">Kompetensi Dasar
                                                                        Akhlak</label>
                                                                    <select class="form-control" name="kompetensi_dasar_akhlak" id="kompetensi_dasar_akhlak">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kompetensi Dasar Akhlak Perilaku Sosial Emosi'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[7] == $kriteria[2]) echo 'selected="selected"'; ?>>
                                                                                <?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kompetensi_dasar_umum">Kompetensi Dasar
                                                                        Umum</label>
                                                                    <select class="form-control" name="kompetensi_dasar_umum" id="kompetensi_dasar_umum">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kompetensi Dasar Umum'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[8] == $kriteria[2]) echo 'selected="selected"'; ?>>
                                                                                <?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kemandirian">Kemandirian</label>
                                                                    <select class="form-control" name="kemandirian" id="kemandirian">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kemandirian'");
                                                                        while ($kriteria = mysqli_fetch_array($query)) {
                                                                        ?>
                                                                            <option value="<?= $kriteria[2]; ?>" <?php if ($row[9] == $kriteria[2]) echo 'selected="selected"'; ?>>
                                                                                <?= $kriteria[2]; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kesiapan">Kesiapan</label>
                                                                    <select class="form-control" name="kesiapan" id="kesiapan">
                                                                        <option>--Silahkan Pilih--</option>
                                                                        <option value="Siap" <?php if ($row[10] == "Siap") echo 'selected="selected"'; ?>>
                                                                            Siap</option>
                                                                        <option value="Belum Siap" <?php if ($row[10] == "Belum Siap") echo 'selected="selected"'; ?>>
                                                                            Belum Siap</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembail</button>
                                                        <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>

                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require 'layouts/footer.php'; ?>