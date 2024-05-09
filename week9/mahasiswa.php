<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}

include ('connections.php');

$query = "select * from mahasiswa ORDER BY nim ASC";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List data Mahasiswa</title>

  <style>
    td {
      padding: 12px;
    }

    .button {
      margin: 10px;
      padding: 7px;
      border: solid 1px black;
      border-radius: 30px;
      text-decoration: none;
      color: black;
    }

    a.button[href^="edit_mahasiswa.php"] {
      background-color: aqua;
    }

    a.button[href^="hapus_mahasiswa.php"] {
      background-color: red;
      color: white;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>Data Mahasiswa</h1>
    </div>
    <hr>
    <nav>
      <ul>
        <li><a href="mahasiswa.php">List Mahasiswa</a></li>
        <li><a href="tambah_mahasiswa.php">Tambah Mahasiswa</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <hr>
    <?php if (isset($message)) { ?>
      <div class="message">
        <h1><?= @$message ?></h1>
      </div>
    <?php } ?>
    <table border="1">
      <tr>
        <th style="padding: 10px;">NIM</th>
        <th style="padding: 10px;">NAMA</th>
        <th style="padding: 10px;">TEMPAT LAHIR</th>
        <th style="padding: 10px;">TANGGAL LAHIR</th>
        <th style="padding: 10px;">FAKULTAS</th>
        <th style="padding: 10px;">PRODI</th>
        <th style="padding: 10px;">IPK</th>
        <th style="padding: 10px;">EDIT</th>
        <th style="padding: 10px;">HAPUS</th>
      </tr>
      <?php
      $result = mysqli_query($conn, $query);
      if (!$result) {
        die("Query Gagal");
      }

      while ($data = mysqli_fetch_assoc($result)) {
        $tgllahir = strtotime($data['tanggal_lahir']);
        $formatdate = date("d-m-Y", $tgllahir);
        ?>
        <tr>
          <td style="padding: 15px;"><?= $data['nim'] ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['tempat_lahir'] ?></td>
          <td><?= $data['tanggal_lahir'] ?></td>
          <td><?= $data['fakultas'] ?></td>
          <td><?= $data['prodi'] ?></td>
          <td><?= $data['IPK'] ?></td>
          <td><a class="button" href="edit_mahasiswa.php?nim=<?= $data['nim'] ?>">EDIT</a>
          </td>
          <td><a class="button" href="hapus_mahasiswa.php?nim=<?= $data['nim'] ?>">HAPUS</a></td>
        </tr>
        <?php
      }

      mysqli_free_result($result);
      mysqli_close($conn);
      ?>
    </table>
  </div>
</body>

</html>