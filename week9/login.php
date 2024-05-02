<?php
// var_dump($_POST);
if (isset($_POST["submit"])) {
  $username = htmlentities(strip_tags(trim($_POST['username'])));
  $password = htmlentities(strip_tags(trim($_POST['password'])));

  $error = "";

  if (empty($username)) {
    $error .= "Username Kosong <br>";
  }
  if (empty($password)) {
    $error .= "Password Kosong <br>";
  }

  include ('connections.php');

  $username = mysqli_real_escape_string($conn, $username);
  $password = mysqli_real_escape_string($conn, $password);

  $password_sha1 = sha1($password);

  $query = "
          select * from admin where username = '$username' and password = '$password_sha1'; ";
  $hasil = mysqli_query($conn, $query);
  if (mysqli_num_rows($hasil) == 0) {
    $error = "Login Gagal";
  }

  mysqli_free_result($hasil);
  mysqli_close($conn);

  if ($error === "") {
    session_start();
    $_SESSION["username"] = $username;
    header("Location: mahasiswa.php");
  }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
</head>

<body>
  <div class="container">
    <h1>Login Page</h1>
    <!-- menampilkan error Login -->
    <?php if (@$error !== "") { ?>
      <div class="alert alert-danger">
        <p><?= @$error ?></p>
      </div>
    <?php } ?>
    <form action="login.php" method="post">
      <fieldset>
        <legend>Login</legend>
        <p>
          <label for="username">Username</label>
          <input type="text" name="username" id="username" placeholder="Masukkan Username disini!">
        </p>
        <p>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" placeholder="Masukkan Username disini!">
        </p>
        <p>
          <input type="submit" name="submit" value="Login">
        </p>
      </fieldset>
    </form>
  </div>
</body>

</html>