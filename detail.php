<?php
require "data.php";
require "fungsi.php";

// ===== Request method GET: membaca parameter ?nim=... =====
$nim = "";
if (isset($_GET["nim"]) && is_string($_GET["nim"])) {
    $nim = trim($_GET["nim"]);
}

$ditemukan = NULL;
$pesan_error = "";

if ($nim === "") {
    $pesan_error = "Parameter NIM tidak ada di URL.";
} else {
    foreach ($mahasiswa as $data) {
        if ($data["nim"] === $nim) {
            $ditemukan = $data;
            break;
        }
    }
    if ($ditemukan === NULL) {
        $pesan_error = "Mahasiswa dengan NIM tersebut tidak ditemukan.";
    }
}

if ($ditemukan === NULL) {
    http_response_code(404);
} else {
    $grade = hitung_grade($ditemukan["nilai"]);
    $status = hitung_status($ditemukan["nilai"]);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <?php if ($ditemukan === NULL): ?>
            <h1>Data Tidak Ditemukan</h1>
            <div class="baris error"><?= aman($pesan_error) ?></div>
            <a class="btn" href="index.php">Kembali</a>
        <?php else: ?>
            <h1>Detail Mahasiswa</h1>
            <div class="baris"><strong>NIM:</strong> <?= aman($ditemukan["nim"]) ?></div>
            <div class="baris"><strong>Nama:</strong> <?= aman($ditemukan["nama"]) ?></div>
            <div class="baris"><strong>Jurusan:</strong> <?= aman($ditemukan["jurusan"]) ?></div>
            <div class="baris"><strong>Email:</strong> <?= aman($ditemukan["email"]) ?></div>
            <div class="baris"><strong>Nilai:</strong> <?= aman($ditemukan["nilai"]) ?></div>
            <div class="baris"><strong>Grade:</strong> <?= aman($grade) ?></div>
            <div class="baris"><strong>Status:</strong> <?= aman($status) ?></div>
            <a class="btn" href="index.php">Kembali</a>
        <?php endif; ?>
    </div>
</body>
</html>
