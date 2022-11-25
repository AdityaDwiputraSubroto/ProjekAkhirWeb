<?php
include 'connect.php';

$berat = $_POST['berat'];
$tinggi = $_POST['tinggi'];
$tinggi = $tinggi;
$usia = $_POST['usia'];
$aktivitas = $_POST['exercise'];
$gender = $_POST['gender'];

$sql = "SELECT * FROM exercise WHERE id_exercise = $aktivitas";
$query = $connect->query($sql);
$data_exercise = $query->fetch_assoc();

if ($gender == 'Male') {
    $bmr = 66.5 + (13.7 * $berat) + (5 * $tinggi) - (6.8 * $usia);
} else {
    $bmr = 655 + (9.6 * $berat) + (1.8 * $tinggi) - (4.7 * $usia);
}
$aktivitas = $data_exercise['aktivitas'];
$tdee = $bmr * $data_exercise['poin'];
$tdee = number_format($tdee, 0);
header("Location:../views/tdee_hasil.php?tdee=$tdee&bmr=$bmr&tinggi=$tinggi&berat=$berat&gender=$gender&usia=$usia&exercise=$aktivitas");
