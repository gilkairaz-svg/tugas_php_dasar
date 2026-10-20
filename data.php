<?php
// data.php : sumber data website (tanpa database)

// Indexed array: daftar jurusan, diakses dengan index angka 0, 1, 2
$daftar_jurusan = [
    "Pendidikan Sistem dan Teknologi Informasi",
    "Sistem Telekomunikasi",
    "Mekatronika dan Kecerdasan Buatan"
];

// Array dua dimensi: setiap baris = [nilai minimal, grade, keterangan]
$skala_nilai = [
    [85, "A", "Sangat baik"],
    [70, "B", "Baik"],
    [60, "C", "Cukup"],
    [40, "D", "Kurang"],
    [0,  "E", "Sangat kurang"]
];

// Associative array di dalam array utama: 1 mahasiswa = 1 associative array
$mahasiswa = [
    [
        "nim"     => "25001",
        "nama"    => "Andi Pratama",
        "jurusan" => $daftar_jurusan[0],
        "email"   => "andi@upi.edu",
        "nilai"   => 88
    ],
    [
        "nim"     => "25002",
        "nama"    => "Budi Santoso",
        "jurusan" => $daftar_jurusan[1],
        "email"   => "budi@upi.edu",
        "nilai"   => 76
    ],
    [
        "nim"     => "25003",
        "nama"    => "Citra Lestari",
        "jurusan" => $daftar_jurusan[2],
        "email"   => "citra@upi.edu",
        "nilai"   => 67
    ],
    [
        "nim"     => "25004",
        "nama"    => "Dina Maharani",
        "jurusan" => $daftar_jurusan[0],
        "email"   => "dina@upi.edu",
        "nilai"   => 92
    ],
    [
        "nim"     => "25005",
        "nama"    => "Eko Saputra",
        "jurusan" => $daftar_jurusan[1],
        "email"   => "eko@upi.edu",
        "nilai"   => 58
    ]
];
