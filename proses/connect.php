<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "prakwebproject";

$connect = new mysqli($hostname, $username, $password, $database);
if ($connect->connect_error) {
    die("error : " . $connect->connect_error);
    //jika terjadi error, matikan proses dengan die() atau exist();
    //die('maaf koneksi gagal: '.$connect->connection_error);
}
