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


$sql = "SELECT * FROM user WHERE username='$username' and password='$password';";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

$cek = mysqli_num_rows($query);


if ($cek <= 0) {
    $sql = "INSERT INTO user (username, password, tanggal_lahir, gender) VALUES ('$username','$password','$tanggal_lahir','$gender')";
    //$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    $query = $connect->query($sql);

    if ($query) {
        $id_user = $connect->insert_id;
        $sql = "INSERT INTO badan (berat, tinggi, date, status, id_user, id_exercise) VALUES ('$berat','$tinggi','$currentdate','active',$id_user,$id_exercise)";
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
