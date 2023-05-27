<?php

include("config.php");

session_start();

error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Utama</title>
    <link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>
    <div class="wrap">
        <h1>Daftar Siswa Jurusan RPL</h1>

    <nav>
    <a href="form-daftar.php" role="button" class="btn btn-primary pull-right">INSERT DATA</a>
    </nav>

    <?php if (isset($_GET['status'])) : ?>
        <p>
            <?php
            if ($_GET['status'] == 'sukses') {
                echo "Pendaftaran siswa baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
            ?>
        </p>
    <?php endif; ?>

    <br>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <!-- <th>Telepon</th>
                <th>Foto</th> -->
                <th>Aksi</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($siswa as $row) : ?>
                <tr>
                    <td><?php $i; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>

                    <td>
                        <form action="detail.php" method="GET">
                            <input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
                            <input type="hidden" name="kelas" value="<?php echo $row['kelas']; ?>">
                            <input type="hidden" name="telepon" value="<?php echo $row['telepon']; ?>">
                            <input type="hidden" name="foto" value="<?php echo $row['foto']; ?>">
                            <button type="submit">Detail</button>
                            <button type="submit">Edit</button>
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                    <td><img src="<?php echo $row['foto']; ?>" alt="<?php echo $row['nama']; ?>"></td>
                </tr>
            <?php endforeach; ?>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM siswa";
            $query = mysqli_query($conn, $sql);

            $index = 1;
            while ($siswa = mysqli_fetch_array($query)) {
                echo "<tr>";
                $poto = "<img src=" . $siswa["foto"] . ">";
                echo "<td>" . $index . "</td>";
                echo "<td>" . $siswa['nama'] . "</td>";
                echo "<td>" . $siswa['kelas'] . "</td>";
                // echo "<td>" . $siswa['telepon'] . "</td>";
                // echo "<td>" . $poto . "</td>";

                echo "<td>";
                echo "<a href='detail.php?id=" . $siswa['id'] . "'>Detail</a> | ";
                echo "<a href='edit.php?id=" . $siswa['id'] . "'>Edit</a> | ";
                echo "<a href='delete.php?id=" . $siswa['id'] . "'>Hapus</a>";
                echo "</td>";

                echo "</tr>";
                $index++;
            }
            ?>
        </tbody>
    </table>
    <br>
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    <br>
    <a href="logout.php" onclick="return confirm('Are you sure to logout?')">Logout</a>
    <br>
    <br>
</body>
    </div>
</html>