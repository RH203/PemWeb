<?php //Insert Data admin
include ('connections.php');

$username = "admin";
$password = sha1("admin");
$query = "INSERT INTO admin VALUES ('','$username','$password')";
$hasil = mysqli_query($conn, $query);
if (!$hasil) {
  die("Gagal mengisi table admin");
} else {
  echo "Table <b>admin</b> berhasil mengisi";
} 
?>