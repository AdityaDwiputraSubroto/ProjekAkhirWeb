<?php
session_start();


include 'connect.php';


$id_makanan = $_POST['makanan'];
$jumlah = $_POST['jumlah'];


$sql = "SELECT * FROM makanan WHERE id_makanan = $id_makanan";
$query = $connect->query($sql);
$data_makanan = $query->fetch_assoc();

//update riwayat kalori makanan
$kalori_makanan = $jumlah * $data_makanan['kalori'];
header("Location:../views/makananpage.php?id_makanan=$id_makanan&jumlah=$jumlah&kalori=$kalori_makanan");
