<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("location:loginpage.php?pesan=belum_login");
}

include 'connect.php';

$id_riwayat = $_GET['id'];
$sql = "DELETE FROM makanan_harian WHERE id_riwayat = $id_riwayat";
$query = $connect->query($sql);
if ($query) {
    $sql = "DELETE FROM riwayat_harian WHERE id_riwayat = $id_riwayat";
    $query = $connect->query($sql);

    if ($query) {
        header("Location:../views/akun.php?page=riwayat");
    } else {
        header("Location:../views/akun.php?page=riwayat");
    }
} else {
    header("Location:../views/akun.php?page=riwayat");
}
