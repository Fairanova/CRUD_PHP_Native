<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru Jurusan RPL</title>
</head>

<body>
    <header>
        <h3>Daftar Siswa Jurusan RPL</h3>
    </header>
    <link rel="stylesheet" type="text/css" href="home.css">
    <form action="proses-daftar.php" method="POST" enctype="multipart/form-data">

        <fieldset>

        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="Nama Lengkap" />
        </p>
        <p>
        <label for="kelas">Kelas: </label>
            <select name="kelas">
                <option value="X RPL-1">X RPL-1</option>
                <option>X RPL-2</option>
                <option>XI RPL-1</option>
                <option>XI RPL-2</option>
                <option>XII RPL-1</option>
                <option>XII RPL-2</option>

            </select>
        <p>
            <label for="telepon">Telepon: </label>
            <input type="text" name="telepon" placeholder="Nomor HP Siswa" />
        </p>


        <p>
            <label for="foto">Foto: </label>
            <input type="file" name="foto">
        </p>
        <p>
            <input type="submit" value="Daftar" name="daftar" />
        </p>

        </fieldset>

    </form>

    </body>
</html>