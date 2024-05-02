<?php
$title = "Form Registration";

$arr_month = [
  "Januari",
  "Februari",
  "Maret",
  "April",
  "Mei",
  "Juni",
  "Juli",
  "Agustus",
  "September",
  "Oktober",
  "November",
  "Desember",
];
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <style>
    .form {
      width: 40%;
    }

    .form .form-element {
      display: flex;
      flex-direction: column;
      margin: 15px 0px;
    }

    .form .form-element input {
      padding: 8px;
    }

    input[type="submit"],
    input[type="reset"] {
      padding: 10px 20px;
      margin: 0px 5px;
      border-radius: 20px;
    }
  </style>

</head>

<body>
  <h1><?= $title ?></h1>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="form">

      <fieldset>
        <legend>Form Mahasiswa</legend>

        <div class="form-element">
          <label for="name">Nama mahasiswa*:</label>
          <input type="text" id="name" name="student_name" placeholder="Nama anda">
        </div>

        <div class="form-element">
          <label for="number">Nomor mahasiswa(NIM)*:</label>
          <input type="number" name="number" id="student_number" placeholder="Nomor nim anda">
        </div>

        <div class="form-element">
          <label for="alamat">Alamat mahasiswa*:</label>
          <textarea name="alamat" id="student_address" cols="30" rows="5" placeholder="Alamat anda"></textarea>
        </div>

        <div class="form-element">
          <label for="birth-date">Tanggal lahir*:</label>

          <div style="display: flex; flex-direction: row; gap: 0px 8px;">
            <select name="tanggal" id="" style="width: 33%;" name="student_birth_date">
              <?php for ($i = 1; $i <= 31; $i++) { ?>
                <option value="<?= $i ?>"><?= $i ?></option>
              <?php }
              ; ?>
            </select>

            <select name="bulan" id="" style="width: 33%;" name="student_birth_month">
              <?php foreach ($arr_month as $months) { ?>
                <option value="<?= $months ?>"><?= $months ?></option>
              <?php }
              ; ?>
            </select>
            <select name="tahun" id="" style="width: 33%;" name="student_birth_year">
              <?php for ($i = 1990; $i <= 2000; $i++) { ?>
                <option value="<?= $i ?>"><?= $i ?></option>
              <?php }
              ; ?>
            </select>
          </div>
        </div>

        <div class="form-element" style="display: flex; flex-direction: row; gap: 0px 8px;">
          <label for="gender">Gender*:</label>
          <div>
            <label for="pria">Pria</label>
            <input type="radio" name="student_gender" id="pria" value="man" checked>
          </div>
          <div>
            <label for="wanita">Wanita</label>
            <input type="radio" name="student_gender" id="wanita" value="woman">
          </div>
        </div>

        <div class="form-element" style="display: flex; flex-direction: row; gap: 0px 8px; ">
          <label for="photo">Upload foto*:</label>
          <input type="file" name="student_photo" id="photo">
        </div>

        <div class="form-element">
          <label for="web">Website mahasiswa*:</label>
          <input type="url" name="student_website" id="web" placeholder="Website anda">
        </div>

      </fieldset>

      <br>

      <fieldset>
        <legend>Info akun*:</legend>

        <div class="form-element">
          <label for="email">Email*:</label>
          <input type="email" name="student_email" id="email" placeholder="Email anda">
        </div>

        <div class="form-element">
          <label for="username">Username*:</label>
          <input type="email" name="student_username" id="username" placeholder="Username anda">
        </div>

        <div class="form-element">
          <label for="password">Password*:</label>
          <input type="password" name="student_password" id="password" placeholder="Password anda">
        </div>

        <div class="form-element">
          <label for="confirm-password">Confirmation Password*:</label>
          <input type="password" name="student_password_confirm" id="confirm-password"
            placeholder="Confirmation password">
        </div>
      </fieldset>

      <br>
      <fieldset>
        <legend>Kemampuan Dasar</legend>
        <table>
          <tr>
            <td>
              <input type="checkbox" name="student_skill_html" value="html" id="html" <?= $student_skill_html ?>><label
                for="html">HTML</label>
              <input type="checkbox" name="student_skill_css" value="css" id="css" <?= $student_skill_css ?>><label
                for="css">CSS</label>
              <input type="checkbox" name="student_skill_js" value="javascript" id="javascript" <?= $student_skill_js ?>><label for="javascript">Javascript</label>
              <input type="checkbox" name="student_skill_php" value="php" id="php" <?= $student_skill_php ?>><label
                for="php">PHP</label>
              <input type="checkbox" name="student_skill_mysql" value="mysql" id="mysql" <?= $student_skill_mysql ?>><label for="mysql">MySQL</label>
              <input type="checkbox" name="student_skill_laravel" value="laravel" id="laravel" <?= $student_skill_laravel ?>><label for="laravel">Laravel</label>
              <input type="checkbox" name="student_skill_react_native" value="react_native" id="react_native"
                <?= $student_skill_react_native ?>><label for="react_native">React Native</label>
            </td>
          </tr>
        </table>
      </fieldset>


    </div>
    <br>
    <div>
      <input type="reset" value="Reset">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>



</body>

</html>