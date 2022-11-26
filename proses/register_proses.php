<?php
session_start();
include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$gender = $_POST['gender'];
$currentdate = date("Y/m/d");
$tinggi = $_POST['tinggi'];
$berat = $_POST['berat'];
$id_exercise = $_POST['exercise'];

//mencari umur
$today = date("d-m-Y");
$age = date_diff(date_create($tanggal_lahir), date_create($today));

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





$sql = "SELECT * FROM user WHERE username='$username' and password='$password';";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

$cek = mysqli_num_rows($query);


if ($cek <= 0) {
    $sql = "INSERT INTO user (username, password, tanggal_lahir, gender) VALUES ('$username','$password','$tanggal_lahir','$gender')";
    //$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    $query = $connect->query($sql);

    if ($query) {
        $id_user = $connect->insert_id;
        $sql = "INSERT INTO badan (berat, tinggi, date, status, id_user, id_exercise, bmi, tdee) VALUES ('$berat','$tinggi','$currentdate','active',$id_user,$id_exercise,$bmi,$tdee)";
        $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
        if ($query) {
            header("Location:../views/loginpage.php?pesan=daftar-berhasil");
        } else {
            header("location:../views/registerpage.php?pesan=daftar-gagal");
        }
    } else {
        header("location:../views/registerpage.php?pesan=daftar-gagal");
    }
} else {
    header("location:../views/registerpage.php?pesan=akun-double");
}
