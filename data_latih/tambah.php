<?php
session_start();
require '../functions.php';

function tambah_datalatih($data)
{
    global $conn;

    $nama_lengkap = $data['nama_lengkap'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $usia = $data['usia'];
    $motorik_kasar = $data['motorik_kasar'];
    $motorik_halus = $data['motorik_halus'];
    $kognitif_anak = $data['kognitif_anak'];
    $kompetensi_dasar_akhlak = $data['kompetensi_dasar_akhlak'];
    $kompetensi_dasar_umum = $data['kompetensi_dasar_umum'];
    $kemandirian = $data['kemandirian'];
    $kesiapan = $data['kesiapan'];

    $query = "INSERT INTO tb_data
				VALUES 
				('','$nama_lengkap','$jenis_kelamin','$usia','$motorik_kasar','$motorik_halus','$kognitif_anak','$kompetensi_dasar_akhlak','$kompetensi_dasar_umum','$kemandirian','$kesiapan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah_datalatih($_POST) > 0) {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: ../datalatih.php");
    } else {
        $_SESSION['status'] = "Data Latih";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: ../datalatih.php");
    }
}