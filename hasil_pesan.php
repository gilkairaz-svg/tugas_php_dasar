<?php
require "fungsi.php";

// Halaman ini hanya boleh dibuka lewat pengiriman form (POST)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: form_pesan.php");
    exit;
}

// ===== Request method POST: membaca $_POST =====
$nama  = ambil_post("nama");
$kelas = ambil_post("kelas");
$pesan = ambil_post("pesan");

// ===== Validasi di sisi server (indexed array untuk menampung error) =====
$error = [];
if ($nama === "") {
    $error[] = "Nama wajib diisi.";
}
if ($kelas === "") {
    $error[] = "Kelas wajib diisi.";
}
if ($pesan === "") {
    $error[] = "Pesan / kesan wajib diisi.";
}
if (strlen($nama) > 100 || strlen($kelas) > 20 || strlen($pesan) > 500) {
    $error[] = "Teks terlalu panjang (maksimal nama 100, kelas 20, pesan 500 karakter).";
}
$berhasil = count($error) === 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $berhasil ? "Pesan Berhasil Dikirim" : "Pesan Gagal Dikirim" ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <?php if ($berhasil): ?>
            <h1>Pesan Berhasil Dikirim</h1>
            <p>Terima kasih, <strong><?= aman($nama) ?></strong>!</p>
            <div class="baris"><strong>Nama:</strong> <?= aman($nama) ?></div>
            <div class="baris"><strong>Kelas:</strong> <?= aman($kelas) ?></div>
            <div class="baris"><strong>Pesan / Kesan:</strong> <?= nl2br(aman($pesan)) ?></div>
            <a class="btn" href="index.php">Kembali ke Data Mahasiswa</a>
        <?php else: ?>
            <h1>Pesan Gagal Dikirim</h1>
            <div class="baris error">
                <?php foreach ($error as $isi_error): ?>
                    <div><?= aman($isi_error) ?></div>
                <?php endforeach; ?>
            </div>
            <a class="btn" href="form_pesan.php">Kembali ke Form</a>
        <?php endif; ?>
    </div>
</body>
</html>
