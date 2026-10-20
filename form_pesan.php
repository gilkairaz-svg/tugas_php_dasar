<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pesan Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card card-form">
        <h1>Form Pesan Mahasiswa</h1>

        <form action="hasil_pesan.php" method="POST">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama">

            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas">

            <label for="pesan">Pesan / Kesan</label>
            <textarea id="pesan" name="pesan"></textarea>

            <div class="aksi">
                <button type="submit" class="btn btn-kecil">Kirim</button>
                <a class="btn btn-abu" href="index.php">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
