<?php
// fungsi.php : fungsi kecil yang dipakai di beberapa halaman

const BATAS_LULUS = 70;

function aman($teks) {
    return htmlspecialchars((string) $teks, ENT_QUOTES, "UTF-8");
}

// Percabangan if / elseif / else untuk menentukan grade
function hitung_grade($nilai) {
    if ($nilai >= 85) {
        $grade = "A";
    } elseif ($nilai >= 70) {
        $grade = "B";
    } elseif ($nilai >= 60) {
        $grade = "C";
    } elseif ($nilai >= 40) {
        $grade = "D";
    } else {
        $grade = "E";
    }
    return $grade;
}

// Operator perbandingan (>=, <=) digabung operator logika && (DAN)
function hitung_status($nilai) {
    if ($nilai >= BATAS_LULUS && $nilai <= 100) {
        return "Lulus";
    }
    return "Tidak Lulus";
}

// switch: memilih nama class CSS sesuai status
function kelas_status($status) {
    switch ($status) {
        case "Lulus":
            $kelas = "lulus";
            break;
        case "Tidak Lulus":
            $kelas = "tidak-lulus";
            break;
        default:
            $kelas = "";
    }
    return $kelas;
}

// Mengambil data $_POST dengan aman: kalau tidak ada / bukan teks, hasilnya ""
function ambil_post($kunci) {
    if (isset($_POST[$kunci]) && is_string($_POST[$kunci])) {
        return trim($_POST[$kunci]);
    }
    return "";
}
