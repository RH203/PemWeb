<?php
$dbhost = "localhost";
$dbuser = "root";
$dbPass = "Raihanfirdaus20.";

//buat koneksi
$connection = mysqli_connect($dbhost, $dbuser, $dbPass);
if (!$connection) {
    die("Koneksi Gagal = " . mysqli_connect_errno() . "," . mysqli_connect_error());
}

//Buat database
$query = "CREATE DATABASE IF NOT EXISTS my_php";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Gagal Buat db");
} else {
    echo "Database <b>my_php</b> berhasil dibuat";
}

//Pilih database
$dbname = "my_php";
$result = mysqli_select_db($connection, $dbname);
if (!$result) {
    die("Gagal Pilih db");
} else {
    echo "Database <b>my_php</b> berhasil Dipilih";
}

//buat table mahasiswa
$query = "DROP TABLE IF EXISTS mahasiswa";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Gagal hapus table");
} else {
    echo "Table <b>mahasiswa</b> berhasil dihapus";
}

$query = "CREATE TABLE mahasiswa(
        nim CHAR(10) PRIMARY KEY,
        nama VARCHAR(255),
        tempat_lahir VARCHAR(50),
        tanggal_lahir DATE,
        fakultas VARCHAR(50),
        prodi VARCHAR(50),
        IPK DECIMAL(3,2)
        )";
$HASIL = mysqli_query($connection, $query);
if (!$HASIL) {
    die("Gagal Baut table mahasiswa");
} else {
    echo "Table <b>mahasiswa</b> berhasil dibuat";
}

//Data mula-mula
$query = "INSERT INTO mahasiswa
    VALUES
    ('1201205500','Zidan Irfan','Surabaya','2004-02-17','FIF','RPL',3.5),
    ('1201240985','Naufal Alfaro','Sidoarjo','2003-12-20','FEI','SI',2.5)";
$hasil = mysqli_query($connection, $query);
if (!$HASIL) {
    die("Gagal mengisi table mahasiswa");
} else {
    echo "Table <b>mahasiswa</b> berhasil diisi";
}

//Table admin
$query = "DROP TABLE IF EXISTS admin";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Gagal hapus table");
} else {
    echo "Table <b>admin</b> berhasil dihapus";
}

$query = "CREATE TABLE admin(
        idAdmin INT(10) PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(255),
        password char(40)
        )";
$HASIL = mysqli_query($connection, $query);
if (!$HASIL) {
    die("Gagal Baut table admin");
} else {
    echo "Table <b>admin</b> berhasil dibuat";
}

//Insert Data admin
$username = "admin";
$password = sha1("adminmahasiswa");
$query = "INSERT INTO admin VALUES ('','$username','$password')";
$hasil = mysqli_query($connection, $query);
if (!$hasil) {
    die("Gagal mengisi table admin");
} else {
    echo "Table <b>admin</b> berhasil mengisi";
}

$username = "admin1";
$password = sha1("adminmahasiswa1");
$query = "INSERT INTO admin VALUES ('','$username','$password')";
$hasil = mysqli_query($connection, $query);
if (!$hasil) {
    die("Gagal mengisi table admin");
} else {
    echo "Table <b>admin</b> berhasil mengisi";
}

mysqli_close($connection);

?>