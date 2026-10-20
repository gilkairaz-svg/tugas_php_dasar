<?php
require "data.php";
require "fungsi.php";

// ===== Variabel dan tipe data =====
$judul = "Daftar Mahasiswa";              // string
$subjudul = "Mini Website PHP Dasar";     // string
$jumlah_mahasiswa = count($mahasiswa);    // integer
$total_nilai = 0;                         // integer
$jumlah_lulus = 0;                        // integer
$nilai_tertinggi = 0;                     // integer
$nama_tertinggi = "-";                    // string
$keterangan_tambahan = NULL;              // NULL (belum ada isi)

// ===== Perulangan foreach + operator =====
foreach ($mahasiswa as $data) {
    $total_nilai += $data["nilai"];                    // operator penugasan
    if (hitung_status($data["nilai"]) == "Lulus") {    // operator perbandingan
        $jumlah_lulus++;
    }
    if ($data["nilai"] > $nilai_tertinggi) {
        $nilai_tertinggi = $data["nilai"];
        $nama_tertinggi = $data["nama"];
    }
}

// ===== Operator aritmatika (pembagian dicek agar tidak dibagi nol) =====
$jumlah_tidak_lulus = $jumlah_mahasiswa - $jumlah_lulus;
if ($jumlah_mahasiswa > 0) {
    $rata_rata = $total_nilai / $jumlah_mahasiswa;                 // float
    $persen_lulus = $jumlah_lulus / $jumlah_mahasiswa * 100;
} else {
    $rata_rata = 0.0;
    $persen_lulus = 0.0;
}
$ada_tidak_lulus = $jumlah_tidak_lulus > 0;                        // boolean

if ($ada_tidak_lulus) {
    $keterangan_tambahan = $jumlah_tidak_lulus . " mahasiswa perlu remedial.";
}

// ===== Penggabungan string (concatenation) =====
$ringkasan = "Jumlah mahasiswa: " . $jumlah_mahasiswa;
$ringkasan .= " | Lulus: " . $jumlah_lulus . " (" . round($persen_lulus) . "%)";
$ringkasan .= " | Tidak lulus: " . $jumlah_tidak_lulus;
$ringkasan .= " | Rata-rata nilai: " . number_format($rata_rata, 1);
$ringkasan .= " | Nilai tertinggi: " . $nama_tertinggi . " (" . $nilai_tertinggi . ")";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= aman($judul) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card card-lebar">
        <div class="header">
            <div>
                <h1><?= aman($judul) ?></h1>
                <p class="subjudul"><?= aman($subjudul) ?></p>
            </div>
            <a class="btn" href="form_pesan.php">Isi Form Pesan</a>
        </div>

        <div class="tabel-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Nilai</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $jumlah_mahasiswa; $i++): ?>
                        <?php
                        $data = $mahasiswa[$i];
                        $grade = hitung_grade($data["nilai"]);
                        $status = hitung_status($data["nilai"]);
                        ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= aman($data["nim"]) ?></td>
                            <td><?= aman($data["nama"]) ?></td>
                            <td><?= aman($data["jurusan"]) ?></td>
                            <td><?= aman($data["nilai"]) ?></td>
                            <td><?= aman($grade) ?></td>
                            <td class="<?= kelas_status($status) ?>"><?= aman($status) ?></td>
                            <td>
                                <a class="btn" href="detail.php?nim=<?= urlencode($data["nim"]) ?>">Lihat Detail</a>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>

        <p class="ringkasan"><?= aman($ringkasan) ?></p>
        <?php if ($keterangan_tambahan !== NULL): ?>
            <p class="ringkasan"><?= aman($keterangan_tambahan) ?></p>
        <?php endif; ?>

        <h3 class="judul-kecil">Skala Penilaian (lulus jika nilai minimal <?= BATAS_LULUS ?>)</h3>
        <div class="tabel-wrap">
            <table class="tabel-kecil">
                <thead>
                    <tr><th>Nilai minimal</th><th>Grade</th><th>Keterangan</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($skala_nilai as $baris): ?>
                        <tr>
                            <td>&ge; <?= aman($baris[0]) ?></td>
                            <td><?= aman($baris[1]) ?></td>
                            <td><?= aman($baris[2]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <details class="cek-tipe">
            <summary>Cek tipe data (var_dump)</summary>
            <pre><?php var_dump($judul, $jumlah_mahasiswa, $rata_rata, $ada_tidak_lulus, $keterangan_tambahan); ?></pre>
        </details>
    </div>
</body>
</html>
