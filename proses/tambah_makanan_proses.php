<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("location:loginpage.php?pesan=belum_login");
}

include 'connect.php';

$currentdate = date("Y/m/d");
$id_makanan = $_POST['makanan'];
$jumlah = $_POST['jumlah'];
$id_riwayat = $_POST['id_riwayat'];
$id_user = $_SESSION['id_user'];

//read data riwayat makanan
$sql = "SELECT * FROM riwayat_harian WHERE id_riwayat = $id_riwayat";
$query = $connect->query($sql);
$data_riwayat = $query->fetch_assoc();

$kalori_makanan = $data_riwayat['kalori_makanan'];

$sql = "SELECT * FROM makanan WHERE id_makanan = $id_makanan";
$query = $connect->query($sql);
$data_makanan = $query->fetch_assoc();

//update riwayat kalori makanan
$kalori_makanan = $kalori_makanan + ($jumlah * $data_makanan['kalori']);
$sql = "UPDATE riwayat_harian SET kalori_makanan = $kalori_makanan WHERE id_riwayat = $id_riwayat;";
$query = $connect->query($sql);

if ($query) {
    $sql = "INSERT INTO makanan_harian(id_makanan,id_riwayat,jumlah) VALUES ($id_makanan, $id_riwayat, $jumlah);";
    $query = $connect->query($sql);
    if ($query) {
        header("Location:../views/akun.php?status=tambah-berhasil");
    } else {
        header("Location:../views/akun.php?status=tambah-gagal");
    }
} else {
    header("Location:../views/akun.php?status=update-gagal");
}
