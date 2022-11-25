<?php
include 'connect.php';

$berat = $_POST['berat'];
$tinggi = $_POST['tinggi'];
$tinggi = $tinggi / 100;

$bmi = $berat / ($tinggi * $tinggi);
$bmi = number_format($bmi, 2);
$bmi2 = $bmi * 2;

header("Location:../views/bmi_hasil.php?bmi=$bmi&tinggi=$tinggi&berat=$berat");
