<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("location:loginpage.php?pesan=belum_login");
}

include 'connect.php';

$id_makanan_harian = $_GET['id'];
$sql = "SELECT * FROM makanan_harian INNER JOIN makanan ON makanan_harian.id_makanan = makanan.id_makanan INNER JOIN riwayat_harian ON riwayat_harian.id_riwayat = makanan_harian.id_riwayat WHERE makanan_harian.id_makanan_harian = $id_makanan_harian";
$query = $connect->query($sql);
$data_makanan = $query->fetch_assoc();

$kalori_makanan = $data_makanan['kalori_makanan'];
$kalori_makanan = $kalori_makanan - ($data_makanan['kalori'] * $data_makanan['jumlah']);

$id_riwayat = $data_makanan['id_riwayat'];
$sql = "UPDATE riwayat_harian SET kalori_makanan = $kalori_makanan WHERE id_riwayat = $id_riwayat";
$query = $connect->query($sql);
if ($query) {
    $sql = "DELETE FROM makanan_harian WHERE id_makanan_harian = $id_makanan_harian";
    $query = $connect->query($sql);

    if ($query) {
        header("Location:../views/akun.php?page=detail&id=$id_riwayat");
    } else {
        header("Location:../views/akun.php?page=detail&id=$id_riwayat");
    }
} else {
    header("Location:../views/akun.php?page=detail&id=$id_riwayat");
}
