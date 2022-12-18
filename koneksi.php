<?php

$hostname = "localhost";
$database = "hotel";
$username = "root";
$password = "";

$connect = mysqli_connect($hostname, $username, $password, $database);

if(!$connect){
    die("koneksi gagal! : " . mysqli_connect_error());
}

?>