<?php
session_start();
$title = "Perhitungan - Naive Bayes (NB)";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'layouts/sidebar.php';
require 'functions.php';

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perhitungan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Perhitungan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php
            if (isset($_POST["submit"])) {
                $nama_lengkap = $_POST['nama_lengkap'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $usia = $_POST['usia'];
                $motorik_kasar = $_POST['motorik_kasar'];
                $motorik_halus = $_POST['motorik_halus'];
                $kongnitif_anak = $_POST['kognitif_anak'];
                $kopetensi_dasar_akhlak_perilaku_sosial_emosi = $_POST['kopetensi_dasar_akhlak_perilaku_sosial_emosi'];
                $kompetensi_dasar_umum = $_POST['kompetensi_dasar_umum'];
                $kemandirian = $_POST['kemandirian'];


                // Perhitungan Naive Bayes
                // Ambil Data 
                $data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data"));
                // Ambil Data Kelas Siap
                $Siap = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Siap'"));
                // Ambil Data Kelas Belum Siap
                $BelumSiap = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Belum Siap'"));
                $hasilSiap = $Siap / $data;
                $hasilBelumSiap = $BelumSiap / $data;

                // Ambil Data Kelas Usia
                $usiaYa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Siap' AND usia = '$usia'"));
                $usiaTidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Belum Siap' AND usia = '$usia'"));
                $hasilusiaYa = $usiaYa / $Siap;
                $hasilusiaTidak = $usiaTidak / $BelumSiap;

                // Ambil Data Kelas Motorik Kasar
                $KasarYa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Siap' AND mototrik_kasar = '$motorik_kasar'"));
                $KasarTidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Belum Siap' AND mototrik_kasar = '$mototrik_kasar'"));
                $hasilKasarYa = $KasarYa / $Siap;
                $hasilKasarTidak = $KasarTidak / $BelumSiap;

                // Ambil Data Kelas Mototrik Halus
                $HalusYa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Siap' AND motorik_halus = '$Mototrik_Halus'"));
                $HalusTidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Belum Siap' AND mototrik_halus = '$mototrik_halus'"));
                $hasilHalusYa = $HalusYa / $Siap;
                $hasilHalusTidak = $HalusTidak / $BelumSiap;

                // Ambil Data Kelas Kognitif Anak
                $KognitifYa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Siap' AND kognitif_anak = '$Kognitif_Anak'"));
                $KognitifTidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Belum Siap' AND kognitif_anak = '$kognitif_anak'"));
                $hasilKognitifYa = $KognitifYa / $Siap;
                $hasilKognitifTidak = $KognitifTidak / $BelumSiap;

                // Ambil Data Kelas Kemandirian
                $KemandirianYa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Siap' AND kemandirian = '$kemandirian'"));
                $KemandirianTidak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data WHERE kesiapan = 'Belum Siap' AND kemandirian = '$kemandirian'"));
                $hasilKemandirianYa = $KemandirianYa / $Siap;
                $hasilKemandirianTidak = $KemandirianTidak / $BelumSiap;

                // Menghitung Probabilitas Akhir Ya
                $hasilpYa = $hasilusiaYa * $hasilKasarYa * $hasilHalusYa * $hasilKognitifYa * $hasilKemandirianYa * $Siap;
                // Menghitung Probabilitas Akhir Tidak
                $hasilpTidak = $hasilusiaTidak * $hasilKasartidak * $hasilHalusTidak * $hasilKognitifTidak * $hasilKemandirianTidak * $BelumSiap;
            ?>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-hover" id="tablePerhitungan" cellspacing="0">
                            <thead class="bg-secondary">
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Motorik_Kasar</th>
                                    <th>Motorik_Halus</th>
                                    <th>Kognitif_Anak</th>
                                    <th>Kemandirian</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tr>
                                <td><?= $nama_lengkap; ?></td>
                                <td><?= $jenis_kelamin; ?></td>
                                <td><?= $usia; ?></td>
                                <td><?= $motorik_kasar; ?></td>
                                <td><?= $motorik_halus; ?></td>
                                <td><?= $kognitif_anak; ?></td>
                                <td><?= $kemandirian; ?></td>
                                <?php
                                if ($hasilpYa > $hasilpTidak) {
                                ?>
                                    <td>
                                        <p>Siap</p>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <p>Belum Siap</p>
                                    </td>
                                <?php } ?>
                            </tr>
                        </table>
                        <form action="add_data.php" method="POST">
                            <input type="hidden" name="nama_lengkap" id="nama_lengkap" value="<?= $nama_lengkap; ?>">
                            <input type="hidden" name="jenis_kelamin" id="jenis_kelamin" value="<?= $jenis_kelamin; ?>">
                            <input type="hidden" name="usia" id="usia" value="<?= $usia; ?>">
                            <input type="hidden" name="motorik_kasar" id="motorik_kasar" value="<?= $Motorik_Kasar; ?>">
                            <input type="hidden" name="motorik_halus" id="motorik_halus" value="<?= $Motorik_Halus; ?>">
                            <input type="hidden" name="kognitif_anak" id="kognitif_anak" value="<?= $Kognitif_Anak; ?>">
                            <input type="hidden" name="kemandirian" id="kemandirian" value="<?= $kemandirian; ?>">
                            <?php
                            if ($hasilpYa > $hasilpTidak) {
                            ?>
                                <input type="hidden" name="kesiapan" id="kesiapan" value="Siap">
                            <?php } else { ?>
                                <input type="hidden" name="kesiapan" id="kesiapan" value="Belum Siap">
                            <?php } ?>
                            <button type="submit" class="btn btn-primary float-right" name="simpan"><i class="fas fa-save"></i> Simpan Data!</button>
                        </form>
                    </div>
                </div>

                <div class="attachment-block clearfix mt-3">
                    <h4 class="mt-3 mb-4">Hasil Perhitungan</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="callout callout-secondary">
                                <h5>Peluang Kepastian Siswa (Siap)</h5>
                                <h3 class="text text-success"><?= $hasilpYa; ?><h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="callout callout-secondary">
                                <h5>Peluang Kepastian Siswa (Belum Siap)</h5>
                                <h3 class="text text-danger"><?= $hasilpTidak; ?><h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Proses Perhitungan -->
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Proses Perhitungan Naive Bayes</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Probabilitas Kelas (Y=Siap)</h5>
                                <p>P(<strong>Y</strong> = <strong>Siap</strong>) <br> = <?= $Siap . '/' . $data; ?> = <strong><?= $hasilSiap; ?></strong></p>
                            </div>
                            <div class="col-md-6">
                                <h5>Probabilitas Kelas (Y=Belum Siap)</h5>
                                <p>P(<strong>Y</strong> = <strong>Belum Siap</strong>) <br> = <?= $BelumSiap . '/' . $data; ?> = <strong><?= $hasilBelumSiap; ?></strong></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Probabilitas Posterior P(Xi|Siap)</h5>
                                <p>P(<strong>Usia</strong> = <strong><?= $usia; ?></strong> | Y=Siap) <br> = <?= $usiaYa . '/' . $Siap; ?> = <?= $hasilusiaYa; ?></p>
                                <p>P(<strong>Mototrik Kasar</strong> = <strong><?= $motorik_kasar; ?></strong> | Y=Siap) <br> = <?= $KasarYa . '/' . $Siap; ?> = <?= $hasilKasarYa; ?></p>
                                <p>P(<strong>Motorik Halus</strong> = <strong><?= $motorik_halus; ?></strong> | Y=Siap) <br> = <?= $HalusYa . '/' . $Siap; ?> = <?= $hasilHalusYa; ?></p>
                                <p>P(<strong>kognitif Anak</strong> = <strong><?= $kognitif_anak; ?></strong> | Y=Siap) <br> = <?= $KognitifYa . '/' . $Siap; ?> = <?= $hasilKognitifYa; ?></p>
                                <p>P(<strong>Kemandirian</strong> = <strong><?= $kemandirian; ?></strong> | Y=Siap) <br> = <?= $KemandirianYa . '/' . $Siap; ?> = <?= $hasilKemandirianYa; ?></p>
                            </div>
                            <div class="col-md-6">
                                <h5>Probabilitas Posterior P(Xi|Belum Siap)</h5>
                                <p>P(<strong>Usia</strong> = <strong><?= $usia; ?></strong> | Y=Belum Siap) <br> = <?= $usiaTidak . '/' . $BelumSiap; ?> = <?= $hasilusiaTidak; ?></p>
                                <p>P(<strong>Motorik Kasar</strong> = <strong><?= $motorik_kasar; ?></strong> | Y= Belum Siap) <br> = <?= $KasarTidak . '/' . $BelumSiap; ?> = <?= $hasilkasarTidak; ?></p>
                                <p>P(<strong>Motorik Halus</strong> = <strong><?= $motorik_halus; ?></strong> | Y= Belum Siap) <br> = <?= $HalusTidak . '/' . $BelumSiap; ?> = <?= $hasilHalusTidak; ?></p>
                                <p>P(<strong>Kognitif Anak</strong> = <strong><?= $kognitif_anak; ?></strong> | Y= Belum Siap) <br> = <?= $KognitifTidak . '/' . $BelumSiap; ?> = <?= $hasilKognitifTidak; ?></p>
                                <p>P(<strong>Kemandirian</strong> = <strong><?= $kemandirian; ?></strong> | Y= Belum Siap) <br> = <?= $KemandirianTidak . '/' . $BelumSiap; ?> = <?= $hasilKemandirianTidak; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h5>P(KLASIFIKASI = Siap) = P( X|Y = Siap). P(Y=Siap)</h5>
                                <p>P(<strong>Klasifikasi</strong> = <strong>Siap</strong> | Y=Siap) <br> = <?= $hasilusiaYa . ' x ' . $hasilKasarYa . ' x ' . $hasilHalusYa . ' x ' . $hasilkognitifYa . ' x ' . $hasilKemandirianYa . ' x ' . $hasilSiap; ?> = <strong><?= $hasilpYa; ?></strong></p>
                            </div>
                            <div class="col-md-6">
                                <h5>P(KLASIFIKASI = Belum Siap) = P( X|Y = Belum Siap). P(Y= Belum Siap)</h5>
                                <p>P(<strong>Klasifikasi</strong> = <strong>Belum Siap</strong> | Y=Belum Siap) <br> = <?= $hasilusiaTidak . ' x ' . $hasilkasarYa . ' x ' . $hasilHalusTidak . ' x ' . $hasilkognitifTidak . ' x ' . $hasilKemandirianTidak . ' x ' . $hasilBelumSiap; ?> = <strong><?= $hasilpTidak; ?></strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kesimpulan -->
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Kesimpulan</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($hasilpYa > $hasilpTidak) {
                        ?>
                            <p>Karena, Peluang Siswa <b class="text-success">Siap</b> <strong>></strong> Peluang Siswa <b class="text-danger">Belum Siap</b>, maka Siswa tersebut <b class="text-success">Siap</b></p>
                        <?php } else { ?>
                            <p>Karena, Peluang Siswa <b class="text-danger">Belum Siap</b>
                                <strong> <
                                    </strong> Peluang Siswa <b class="text-success">Siap</b>, maka Siswa tersebut <b class="text-danger">Belum Siap</b>
                            </p>
                        <?php } ?>
                    </div>
                </div>

            <?php } else { ?>
                <div class="row">
                    <div class="col-md-4">
                        <form action="" method="GET">
                            <div class="form-group">
                                <label for="nama_lengkap">Masukkan Nama Lengkap</label>
                                <input class="form-control" placeholder="Masukkan Nama Lengkap" type="text" id="cari" name="cari" value="<?php if (isset($_GET['cari'])) {
                                                                                                                                        echo $_GET['cari'];
                                                                                                      } ?>" size="100" autocomplete="off" autofocus required>
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
                            if ($d["status"] == 1) {
                ?>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="alert alert-primary">
                                            <p>Siswa dengan Nama <strong><?= $d["nama_lengkap"]; ?></strong> telah diproses.</p>
                                        </div>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" autocomplete="off" placeholder="Nama Lengkap" value="<?= $d["nama_lengkap"]; ?>" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tmp_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" autocomplete="off" placeholder="Tempat Lahir" value="<?= $d["tmp_lahir"]; ?>" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" autocomplete="off" placeholder="Nama Ayah" value="<?= $d["nama_ayah"]; ?>" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" autocomplete="off" placeholder="Pekerjaan Ayah" value="<?= $d["pekerjaan_ayah"]; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" autocomplete="off" placeholder="Jenis Kelamin" value="<?= $d["jenis_kelamin"]; ?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="usia">Usia</label>
                                                <input type="text" class="form-control" name="usia" id="usia" autocomplete="off" placeholder="Usia" value="<?= $d["usia"]; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" autocomplete="off" placeholder="Tanggal Lahir" value="<?= $d["tgl_lahir"]; ?>" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" autocomplete="off" placeholder="Nama Ibu" value="<?= $d["nama_ibu"]; ?>" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" autocomplete="off" placeholder="Pekerjaan Ibu" value="<?= $d["pekerjaan_ibu"]; ?>" disabled>
                                    </div>
                                </div>
                                <hr>
                                <form action="" method="POST">
                                    <input type="hidden" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $d["nama_lengkap"]; ?>">
                                    <input type="hidden" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $d["jenis_kelamin"]; ?>">      
                                    <input type="hidden" class="form-control" name="usia" id="usia" value="<?= $d["usia"]; ?>">      
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="motorik_kasar">Motorik Kasar</label>
                                                <select class="form-control" name="motorik_Kasar" id="motorik_kasar" required>
                                                    <option value="">--Silahkan Pilih--</option>
                                                    <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'motorik kasar'");
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
                                                    $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'motorik halus'");
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
                                                    $sql = mysqli_query($conn, "SELECT * FROM tb_kondisi WHERE nama_kriteria = 'kognitif anak'");
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

                                    <button type="submit" class="float" name="submit"><i class="icon fas fa-search-plus"></i></button>

                                </form>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-4">
                                <p class="alert alert-danger">Data <b><?= $_GET['cari']; ?></b> Tidak Ada</p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>


            <?php } ?>
        </div>
    </section>
</div>

<?php
require 'layouts/footer.php'; ?>