<?php
// mengkoneksikan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_beasiswa";

$sat = mysqli_connect($servername, $username, $password, $dbname);

if (!$sat) {
    die("Koneksi gagal: " . mysqli_connect_error());
}