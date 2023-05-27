<?php

// menghubungkan ke file config.php
require 'config.php';

//query data siswa berdasarkan id
if(isset($_GET['id'])){

    $id = $_GET['id']; // ambil data dari URL

    $query = "SELECT * FROM siswa WHERE id = $id";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        $nama  = $row['nama'];
        $kelas = $row['kelas'];
        $telepon = $row['telepon'];
        $foto = $row['foto'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <link rel="stylesheet" type="text/css" href="home.css">

</head>
<body>

<div class="container">
    <div class="jumbotron text-center">
        <h2>DETAIL SISWA</h2>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <img src="<?= $foto?>" alt="<?= $nama ?>" class="thumbnail" width="50%" height="auto">
        </div>
        <div class="col-md-8">
            <h3>Nama : <?= $nama ?></h3>
            <h3>Kelas : <?= $kelas ?></h3>
            <h3>No. Telepon : <?= $telepon ?></h3>
        </div>
    </div>
    <p><button onclick="history.back()">Go Back</button></p>
</div>

</body>
</html>

<?php

    } else {
        echo "Data tidak ditemukan.";
    }

}

?>
