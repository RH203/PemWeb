<?php

require_once 'connections.php';


if (!isset($_GET['nim'])) {
  die('Error: NIM parameter is missing.');
}
$nim = $_GET['nim'];

$query = "SELECT * FROM mahasiswa WHERE nim = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $nim);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $fakultas = $_POST['fakultas'];
  $prodi = $_POST['prodi'];
  $ipk = $_POST['ipk'];

  if (!isset($nama) || !isset($tempat_lahir) || !isset($tanggal_lahir) || !isset($fakultas) || !isset($prodi) || !isset($ipk)) {
    die('Error: All fields are required.');
  }

  $query = "UPDATE mahasiswa SET nama = ?, tempat_lahir = ?, tanggal_lahir = ?, fakultas = ?, prodi = ?, IPK = ? WHERE nim = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'ssssssi', $nama, $tempat_lahir, $tanggal_lahir, $fakultas, $prodi, $ipk, $nim);
  if (mysqli_stmt_execute($stmt)) {
    echo "Record updated successfully.";

    header('Location: mahasiswa.php');
    exit;
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mahasiswa</title>

  <style>

  </style>
</head>



<body>
  <hr>
  <header>
    <h1>Edit Mahasiswa</h1>
  </header>
  <hr>
  <?php if (isset($data)) { ?>
    <form action="" method="POST">
      <div>
        NIM: <input disabled name="nim" value="<?= $data['nim'] ?>">
      </div>
      <br>

      <div>
        Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>">
      </div>
      <br>

      <div>
        Tempat Lahir: <input type="text" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>">
      </div>
      <br>
      <div>
        Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>">
      </div>
      <br>
      <div>
        Fakultas: <input type="text" name="fakultas" value="<?= $data['fakultas'] ?>">
      </div>
      <br>
      <div>
        Program Studi: <input type="text" name="prodi" value="<?= $data['prodi'] ?>">
      </div>
      <br>
      <div>
        IPK: <input type="text" name="ipk" value="<?= $data['IPK'] ?>">
      </div>
      <br>
      <button type="submit">Simpan</button>
    </form>
  <?php } else { ?>
    <p>NIM tidak ditemukan.</p>
  <?php } ?>
</body>

</html>