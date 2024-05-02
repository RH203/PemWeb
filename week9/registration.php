<?php
$title = "Form registration";
$arr_month = [
  "januari",
  "februari",
  "maret",
  "april",
  "mei",
  "juni",
  "juli",
  "agustus",
  "september",
  "oktober",
  "november",
  "desember"
];
$error_message = "";
if (isset($_POST["submit"])) {
  $student_name = htmlentities(strip_tags(trim($_POST["student_name"])));
  $student_number = htmlentities(strip_tags(trim($_POST["student_number"])));
  $student_address = htmlentities(strip_tags(trim($_POST["student_address"])));
  $student_birth_date = htmlentities(strip_tags(trim($_POST["student_birth_date"])));
  $student_birth_month = htmlentities(strip_tags(trim($_POST["student_month"])));
  $student_birth_year = htmlentities(strip_tags(trim($_POST["student_birth_year"])));
  $student_gender = htmlentities(strip_tags(trim($_POST["student_gender"])));
  $student_website = htmlentities(strip_tags(trim($_POST["student_website"])));
  $student_email = htmlentities(strip_tags(trim($_POST["student_email"])));
  $student_username = htmlentities(strip_tags(trim($_POST["student_username"])));
  $student_password = htmlentities(strip_tags(trim($_POST["student_password"])));
  $student_password_confirmation = htmlentities(strip_tags(trim($_POST["student_password_confirmation"])));

  if (empty($student_name))
    $error_message .= "Nama mahasiswa belum diisi<br>";
  if (empty($student_number))
    $error_message .= "NIM mahasiswa belum diisi<br>";
  if (empty($student_address))
    $error_message .= "Alamat mahasiswa belum diisi<br>";
  if (empty($student_website))
    $error_message .= "Website mahasiswa belum diisi<br>";
  if (empty($student_email))
    $error_message .= "Email belum diisi<br>";
  if (empty($student_username))
    $error_message .= "Username belum diisi<br>";
  if (empty($student_password))
    $error_message .= "Password belum diisi<br>";
  if (empty($student_password_confirmation))
    $error_message .= "Konfirmasi password belum diisi<br>";

  $upload_error = $_FILES["student_photo"]["error"];
  if ($upload_error !== 0) {
    $arr_upload_error = [
      1 => '- Ukuran file foto melewati batas maksimal <br>',
      2 => '- Ukuran file foto melewati batas maksimal 1MB <br>',
      3 => '- File foto hanya ter-upload sebagian <br>',
      4 => '- Foto tidak ditemukan <br>',
      6 => '- Server Error (Upload Foto) <br>',
      7 => '- Server Error (Upload Foto) <br>',
      8 => '- Server Error (Upload Foto) <br>',
    ];
    $error_message .= $arr_upload_error[$upload_error];
  } else {
    $folder_name = "folder_upload";
    $file_name = $_FILES["student_photo"]["name"];
    $file_path = "$folder_name/$file_name";
    $file_size = $_FILES["student_photo"]["size"];
    $check = getimagesize($_FILES["student_photo"]["tmp_name"]);
    if (file_exists($file_path)) {
      $error_message .= "image sudah ada <br>";
    }
    if ($file_size > 1048576) {
      $error_message .= "file melebihi 1mb <br>";
    }
    if ($check === false) {
      $error_message .= "mohon upload file gambar yang benar <br>";
    }
  }

  if ($error_message === "") {
    $folder_name = "folder_upload";
    $tmp = $_FILES["student_photo"]["tmp_name"];
    $file_name = $_FILES["student_photo"]["name"];
    move_uploaded_file($tmp, "$folder_name/$file_name");
    include ("registration_process.php");
    die;
  }
} else {
  $checked_man = "";
  $checked_woman = "";
  switch ($student_gender) {
    case 'man':
      $student_gender = "Pria";
      $checked_man = "checked";
      break;
    case 'woman':
      $student_gender = "Wanita";
      $checked_woman = "checked";
      break;
  }

  $student_skill_html = "";
  $student_skill_html_text = "";
  $student_skill_css = "";
  $student_skill_css_text = "";
  $student_skill_js = "";
  $student_skill_js_text = "";
  $student_skill_php = "";
  $student_skill_php_text = "";
  $student_skill_mysql = "";
  $student_skill_mysql_text = "";
  $student_skill_laravel = "";
  $student_skill_laravel_text = "";
  $student_skill_react_native = "";
  $student_skill_react_native_text = "";

  if (isset($_POST["student_skill_html"])) {
    $student_skill_html = "checked";
    $student_skill_html_text = "HTML";
  }

  if (isset($_POST["student_skill_css"])) {
    $student_skill_css = "checked";
    $student_skill_css_text = ", CSS";
  }

  if (isset($_POST["student_skill_js"])) {
    $student_skill_js = "checked";
    $student_skill_js_text = ", Javascript";
  }

  if (isset($_POST["student_skill_php"])) {
    $student_skill_php = "checked";
    $student_skill_php_text = ", PHP";
  }

  if (isset($_POST["student_skill_mysql"])) {
    $student_skill_mysql = "checked";
    $student_skill_mysql_text = ", MySQL";
  }

  if (isset($_POST["student_skill_laravel"])) {
    $student_skill_laravel = "checked";
    $student_skill_laravel_text = ", Laravel";
  }

  if (isset($_POST["student_skill_react_native"])) {
    $student_skill_react_native = "checked";
    $student_skill_react_native_text = ", React Native";
  }
  if ($error_message === "") {
    $folder_name = "folder_upload";
    $tmp = $_FILES["student_photo"]["tmp_name"];
    $file_name = $_FILES["student_photo"]["name"];
    move_uploaded_file($tmp, "$folder_name/$file_name");
    include ("registration_process.php");
    die;
  } else {
    $student_name = "";
    $student_number = "";
    $student_address = "";
    $student_birth_date = 1;
    $student_birth_month = "1";
    $student_birth_year = "1990";
    $checked_man = "checked";
    $checked_woman = "";
    $student_website = "";
    $student_email = "";
    $student_username = "";
    $student_password = "";
    $student_password_confirmation = "";
    $student_skill_html = "";
    $student_skill_css = "";
    $student_skill_js = "";
    $student_skill_php = "";
    $student_skill_mysql = "";
    $student_skill_laravel = "";
    $student_skill_react_native = "";
  }
}
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
  <div style="border: red solid 3px; width: 40%; background-color: rosybrown; margin: 20px">
    <?php
    if ($error_message) { ?>
      <div><?= $error_message ?></div>
    <?php }
    ; ?>
  </div>

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
          <input type="number" name="student_number" id="number" placeholder="Nomor nim anda">
        </div>

        <div class="form-element">
          <label for="alamat">Alamat mahasiswa*:</label>
          <textarea name="student_address" id="alamat" cols="30" rows="5" placeholder="Alamat anda"></textarea>
        </div>

        <div class="form-element">
          <label for="birth-date">Tanggal lahir*:</label>

          <div style="display: flex; flex-direction: row; gap: 0px 8px;">
            <select id="tanggal" style="width: 33%;" name="student_birth_date">
              <?php for ($i = 1; $i <= 31; $i++) { ?>
                <option value="<?= $i ?>"><?= $i ?></option>
              <?php }
              ; ?>
            </select>

            <select id="" style="width: 33%;" name="student_month">
              <?php foreach ($arr_month as $months) { ?>
                <option value="<?= $months ?>"><?= ucfirst($months) ?></option>
              <?php }
              ; ?>
            </select>
            <select id="year" style="width: 33%;" name="student_birth_year">
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
          <input type="text" name="student_username" id="username" placeholder="Username anda">
        </div>

        <div class="form-element">
          <label for="password">Password*:</label>
          <input type="password" name="student_password" id="password" placeholder="Password anda">
        </div>

        <div class="form-element">
          <label for="confirm-password">Confirmation Password*:</label>
          <input type="password" name="student_password_confirmation" id="confirm-password"
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