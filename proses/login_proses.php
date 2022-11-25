<?php
session_start();
include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username' and password='$password';";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
$data = $query->fetch_assoc();

$cek = mysqli_num_rows($query);


if ($cek > 0) {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['gender'] = $data['gender'];
    $_SESSION['status'] = "login";

    header("Location:../index.php");
} else {
    header("location:../views/loginpage.php?pesan=login-gagal");
}
