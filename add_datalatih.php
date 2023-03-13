<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Data Latih - Naive Bayes (NB)";
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
                    <h1 class="m-0">Tambah Data Latih</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="datalatih.php">Data Latih</a></li>
                        <li class="breadcrumb-item active">Data Latih</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="" method="GET">
                        <div class="form-group">
                            <label for="nama_lengkap">Masukkan Nama Lengkap</label>
                            <input class="form-control" placeholder="Masukkan Nama Lengkap" type="text" id="cari"
                                name="cari"
                                value="<?php if (isset($_GET['cari'])) {
                                                                                                                                            echo $_GET['cari'];
                                                                                                                                        } ?>"
                                size="100" autocomplete="off" autofocus required>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_GET['cari'])) {

                $cari = $_GET['cari'];

                $data = mysqli_query($conn, "SELECT * FROM tb_siswa
                                                        WHERE nama_lengkap = '$cari'");

                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_assoc($data)) {
            ?>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" autocomplete="off"
                        placeholder="Nama Lengkap" value="<?= $d["nama_lengkap"]; ?>" disabled>
                </div>
                <div class="col-md-3">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" autocomplete="off"
                        placeholder="Tempat Lahir" value="<?= $d["tmp_lahir"]; ?>" disabled>
                </div>
                <div class="col-md-3">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" autocomplete="off"
                        placeholder="Nama Ayah" value="<?= $d["nama_ayah"]; ?>" disabled>
                </div>
                <div class="col-md-3">
                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" autocomplete="off"
                        placeholder="Pekerjaan Ayah" value="<?= $d["pekerjaan_ayah"]; ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                autocomplete="off" placeholder="Jenis Kelamin" value="<?= $d["jenis_kelamin"]; ?>"
                                disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="usia">Usia</label>
                            <input type="text" class="form-control" name="usia" id="usia" autocomplete="off"
                                placeholder="Usia" value="<?= $d["usia"]; ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" autocomplete="off"
                        placeholder="Tanggal Lahir" value="<?= $d["tgl_lahir"]; ?>" disabled>
                </div>
                <div class="col-md-3">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" autocomplete="off"
                        placeholder="Nama Ibu" value="<?= $d["nama_ibu"]; ?>" disabled>
                </div>
                <div class="col-md-3">
                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" autocomplete="off"
                        placeholder="Pekerjaan Ibu" value="<?= $d["pekerjaan_ibu"]; ?>" disabled>
                </div>
            </div>
            <hr>
            <form action="data_latih/tambah.php" method="POST">
                <input type="hidden" class="form-control" name="nama_lengkap" id="nama_lengkap"
                    value="<?= $d["nama_lengkap"]; ?>">
                <input type="hidden" class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                    value="<?= $d["jenis_kelamin"]; ?>">
                <input type="hidden" class="form-control" name="usia" id="usia" value="<?= $d["usia"]; ?>">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="mototrik_kasar">Motorik Kasar</label>
                            <select class="form-control" name="motorik_kasar" id="motorik_kasar" required>
                                <option value="">--Silahkan Pilih--</option>
                                <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Motorik Kasar'");
                                            while ($pt = mysqli_fetch_assoc($sql)) {
                                            ?>
                                <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="motorik_halus">Motorik Halus</label>
                            <select class="form-control" name="motorik_halus" id="motorik_halus" required>
                                <option value="">--Silahkan Pilih--</option>
                                <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Motorik Halus'");
                                            while ($pt = mysqli_fetch_assoc($sql)) {
                                            ?>
                                <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kognitif_anak">Kognitif Anak</label>
                            <select class="form-control" name="kognitif_anak" id="kognitif_anak" required>
                                <option value="">--Silahkan Pilih--</option>
                                <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kognitif Anak'");
                                            while ($pt = mysqli_fetch_assoc($sql)) {
                                            ?>
                                <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kemandirian">Kemandirian</label>
                            <select class="form-control" name="kemandirian" id="kemandirian" required>
                                <option value="">--Silahkan Pilih--</option>
                                <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kemandirian'");
                                            while ($pt = mysqli_fetch_assoc($sql)) {
                                            ?>
                                <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kompetensi_dasar_akhlak">Kompentensi Dasar Akhlak Perilaku Sosial Emosi</label>
                            <select class="form-control" name="kompetensi_dasar_akhlak" id="kompetensi_dasar_akhlak"
                                required>
                                <option value="">--Silahkan Pilih--</option>
                                <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kompetensi Dasar Akhlak Perilaku Sosial Emosi'");
                                            while ($pt = mysqli_fetch_assoc($sql)) {
                                            ?>
                                <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kompetensi_dasar_umum">Kompentensi Dasar Umum</label>
                            <select class="form-control" name="kompetensi_dasar_umum" id="kompetensi_dasar_umum"
                                required>
                                <option value="">--Silahkan Pilih--</option>
                                <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kompetensi Dasar Umum'");
                                            while ($pt = mysqli_fetch_assoc($sql)) {
                                            ?>
                                <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kesiapan">Kesiapan</label>
                            <select class="form-control" name="kesiapan" id="kesiapan" required>
                                <option value="">--Silahkan Pilih--</option>
                                <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'Kesiapan'");
                                            while ($pt = mysqli_fetch_assoc($sql)) {
                                            ?>
                                <option value="<?= $pt["kondisi"]; ?>"><?= $pt["kondisi"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3 mb-3" name="tambah"><i
                        class="icon fas fa-plus-circle">
                        Tambah Data!</i></button>

            </form>
            <?php } ?>
            <?php } else { ?>
            <div class="row">
                <div class="col-4">
                    <p class="alert alert-danger">Data <b><?= $_GET['cari']; ?></b> Tidak Ada</p>
                </div>
            </div>
            <?php } ?>
            <?php } ?>

        </div>
    </section>
</div>

<?php
require 'layouts/footer.php'; ?>