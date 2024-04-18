<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic PHP?</title>
</head>

<body>

  <?php
  // Standard
  echo "<p>Kalimat ini berasal dari Standard PHP tag </p>";

  // Case Insensitive
  echo "<p>Hello World</p>";
  echo "<p>Hello World</p>";
  echo "<p>Hello World</p>";

  // Case Insensitive Error / Warning
  $andi = "Andi";
  echo $Andi; // Notice: Undefined variable: Andi
  
  // Statement
  echo "<p>Hello world</p>";
  $a = 3;
  $b = 4;
  $nama = "Informatika";
  $c = $a / 25.0;
  if ($a != $b) {
    echo "<p>Pemrograman Web</p>";
  }

  // Parse Error (Semicolon)
  // $a = 5 + 7
  // echo $a;
  
  ?>
</body>

</html>