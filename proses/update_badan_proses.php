<?php
session_start();
include 'connect.php';

$currentdate = date("Y/m/d");
$tinggi = $_POST['tinggi'];
$berat = $_POST['berat'];
$id_exercise = $_POST['exercise'];
$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM user INNER jOIN badan ON user.id_user = badan.id_user WHERE badan.id_user = $id_user AND badan.status = 'active';";
$query = $connect->query($sql);
$data_badan = $query->fetch_assoc();

//mencari umur
$dateold = $data_badan['date'];
$today = date("Y-m-d");
$difdate = date_diff(date_create($dateold), date_create($today));
$difdate = $difdate->format("%a");
$id_badan = $data_badan['id_badan'];


if ($difdate > 0) {
    $sql = "UPDATE badan SET status = 'not active' WHERE id_badan = $id_badan;";
    $query = $connect->query($sql);
    if ($query) {
        $sql = "INSERT INTO badan (berat, tinggi, date, status, id_user, id_exercise) VALUES ('$berat','$tinggi','$currentdate','active',$id_user,$id_exercise)";
        $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
        if ($query) {
            header("Location:../views/akun.php?pesan=update-berhasil");
        } else {
            header("location:../views/akun.php?pesan=update-gagal");
        }
    } else {
        header("location:../views/akun.php?pesan=update-gagal");
    }
} else {
    $sql = "UPDATE badan SET tinggi = $tinggi, berat = $berat, id_exercise = $id_exercise WHERE id_badan = $id_badan AND status = 'active';";
    $query = $connect->query($sql);
    if ($query) {
        header("Location:../views/akun.php?pesan=update-berhasil");
    } else {
        header("location:../views/akun.php?pesan=update-gagal");
    }
}
