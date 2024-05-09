<?php
include('connections.php');

if(isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
    
    $delete = mysqli_query($conn, $query);

    if($delete) {
        header("Location: mahasiswa.php");
        exit(); 
    } else {
        echo "Gagal menghapus data mahasiswa.";
    }
} else {
    echo "NIM tidak ditemukan.";
}

mysqli_close($conn);
?>
