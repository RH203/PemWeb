<?php
$dbhost = "localhost";
$dbuser = "root";
$dbPass = "Raihanfirdaus20.";
$dbname = "my_php";

$conn = mysqli_connect($dbhost, $dbuser, $dbPass, $dbname);
if (!$conn) {
  die("Koneksi gagal: ," . mysqli_connect_errno() . "," . mysqli_connect_error());
}
;
?>