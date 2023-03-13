<?php
session_start();
require '../functions.php';

function ubah_datalatih($data)
{
    global $conn;
    $id = $data["id"];
    $usia = $data['usia'];
    $motorik_kasar = $data['motorik_kasar'];
    $motorik_halus = $data['motorik_halus'];
    $kognitif_anak = $data['kognitif_anak'];
    $kompetensi_dasar_akhlak = $data['kompetensi_dasar_akhlak'];
    $kompetensi_dasar_umum = $data['kompetensi_dasar_umum'];
    $kemandirian = $data['kemandirian'];
    $kesiapan = $data['kesiapan'];

    $query = "UPDATE tb_data
                SET
				usia = '$usia',
				motorik_kasar = '$motorik_kasar',
				motorik_halus = '$motorik_halus',
				kognitif_anak = '$kognitif_anak',
				kompetensi_akhlak = '$kompetensi_dasar_akhlak',
				kompetensi_umum = '$kompetensi_dasar_umum',
				kemandirian = '$kemandirian',
				kesiapan = '$kesiapan'
                WHERE id = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Ubah Data
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah_datalatih($_POST) > 0) {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Diubah";
        header("Location: ../datalatih.php");
    } else {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Diubah";
        header("Location: ../datalatih.php");
    }
}
