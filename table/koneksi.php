<?php

$host = "localhost";
$user = "root";
$pass = "admindpp";
$database = "ecertdb";
$port = "3306";

$koneksi = mysqli_connect($host, $user, $pass, $database, $port);

if (!$koneksi) {
    die("Connection to ecertdb failed: " . mysqli_connect_error());
}

?>