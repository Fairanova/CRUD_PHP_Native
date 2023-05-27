<?php

include("config.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: home.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM siswa WHERE id=$id";
$query = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Formulir Edit Siswa Jurusan RPL</title>
</head>

<body>
    <header>
        <h1>Formulir Edit Siswa</h1>
    </header>
    <link rel="stylesheet" type="text/css" href="home.css">
    <form action="proses-edit.php" method="POST" enctype="multipart/form-data">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="Nama lengkap" value="<?php echo $siswa['nama'] ?>" />
            </p>
            <p>
                <label for="kelas">Kelas: </label>
                <?php $kelas = $siswa['kelas']; ?>
                <select name="kelas">
                    <option <?php echo ($kelas == 'X RPL-1') ? "selected" : "" ?>>X RPL-1</option>
                    <option <?php echo ($kelas == 'X RPL-2') ? "selected" : "" ?>>X RPL-2</option>
                    <option <?php echo ($kelas == 'XI RPL-1') ? "selected" : "" ?>>XI RPL-1</option>
                    <option <?php echo ($kelas == 'XI RPL-2') ? "selected" : "" ?>>XI RPL-2</option>
                    <option <?php echo ($kelas == 'XII RPL-1') ? "selected" : "" ?>>XII RPL-1</option>
                    <option <?php echo ($kelas == 'XII RPL-2') ? "selected" : "" ?>>XII RPL-2</option>

                </select>
            <p>
                <label for="telepon">Telepon: </label>
                <textarea name="telepon"><?php echo $siswa['telepon'] ?></textarea>
            </p>

            <p>
                <label>Foto:</label>
                <input type="file" name="foto">
                <input type="text" name="oldFoto" value="<?= $siswa['foto'] ?>" hidden>
            </p>

            <p>
                <input type="submit" value="Save" name="update" />
            </p>

        </fieldset>


    </form>

</body>