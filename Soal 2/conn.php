<?php
$servername = "localhost";
$username = "root";
$password = "";
$db       = "db_penjualan";

// Create connection
  $mysqli = new mysqli($servername, $username, $password, $db);

// Check connection
if (!$mysqli) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
