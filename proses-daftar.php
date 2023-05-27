<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $telepon = $_POST['telepon'];
    $foto = 'foto/'. $_FILES["foto"]['name'];
    move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
    

    // buat query
    $sql = "INSERT INTO siswa (nama, kelas, telepon, foto) VALUE ('$nama', '$kelas', '$telepon', '$foto')";
    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: home.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: home.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>