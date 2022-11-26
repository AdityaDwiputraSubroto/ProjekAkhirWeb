<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("location:loginpage.php?pesan=belum_login");
}

include 'connect.php';

$currentdate = date("Y/m/d");
$tinggi = $_POST['tinggi'];
$berat = $_POST['berat'];
$id_exercise = $_POST['exercise'];
$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM user INNER jOIN badan ON user.id_user = badan.id_user WHERE badan.id_user = $id_user AND badan.status = 'active';";
$query = $connect->query($sql);
$data_badan = $query->fetch_assoc();

//mencari gap date badan
$dateold = $data_badan['date'];
$today = date("Y-m-d");
$difdate = date_diff(date_create($dateold), date_create($today));
$difdate = $difdate->format("%a");
$id_badan = $data_badan['id_badan'];

//mencari umur
$tanggal_lahir = $data_badan['tanggal_lahir'];
$today = date("d-m-Y");
$age = date_diff(date_create($tanggal_lahir), date_create($today));

$gender = $data_badan['gender'];
$usia = (int)$age->format('%y');
$tinggiM = $tinggi / 100;
$bmi = $berat / ($tinggiM * $tinggiM);
$bmi = number_format($bmi, 2); //---BMI


if ($gender == 'Male') { //-----------Hitung BMR
    $bmr = 66.5 + (13.7 * $berat) + (5 * $tinggi) - (6.8 * $usia);
} else {
    $bmr = 655 + (9.6 * $berat) + (1.8 * $tinggi) - (4.7 * $usia);
}
$sql = "SELECT * FROM exercise WHERE id_exercise = $id_exercise";
$query = $connect->query($sql);
$data_exercise = $query->fetch_assoc();
$tdee = $bmr * $data_exercise['poin']; //tdee



if ($difdate > 0) {
    $sql = "UPDATE badan SET status = 'not active' WHERE id_badan = $id_badan;";
    $query = $connect->query($sql);
    if ($query) {
        $sql = "INSERT INTO badan (berat, tinggi, date, status, id_user, id_exercise, bmi, tdee) VALUES ('$berat','$tinggi','$currentdate','active',$id_user,$id_exercise,$bmi,$tdee)";
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
    $sql = "UPDATE badan SET tinggi = $tinggi, berat = $berat, id_exercise = $id_exercise, bmi = $bmi, tdee = $tdee WHERE id_badan = $id_badan AND status = 'active';";
    $query = $connect->query($sql);
    if ($query) {
        header("Location:../views/akun.php?pesan=update-berhasil");
    } else {
        header("location:../views/akun.php?pesan=update-gagal");
    }
}
