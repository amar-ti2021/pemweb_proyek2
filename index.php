<?php
require_once "BMI.php";
require_once "BMIPasien.php";
require_once "Pasien.php";

$data = [
    [
        "id" => 1,
        "kode" => "P001",
        "tgl_periksa" => "2022-01-10",
        "nama" => "Ahmad",
        "tmp_lahir" => "Jakarta",
        "tgl_lahir" => "2000-01-01",
        "email" => "ahmad@mail.com",
        "gender" => "L",
        "berat" => 69.8,
        "tinggi" => 169,
    ],
    [
        "id" => 2,
        "kode" => "P002",
        "tgl_periksa" => "2022-01-10",
        "nama" => "Rina",
        "tmp_lahir" => "Jakarta",
        "tgl_lahir" => "2000-01-01",
        "email" => "rina@mail.com",
        "gender" => "P",
        "berat" => 55.3,
        "tinggi" => 165,
    ],
    [
        "id" => 3,
        "kode" => "P003",
        "tgl_periksa" => "2022-01-11",
        "nama" => "Lutfi",
        "tmp_lahir" => "Jakarta",
        "tgl_lahir" => "2000-01-01",
        "email" => "lutfi@mail.com",
        "gender" => "L",
        "berat" => 45.2,
        "tinggi" => 171,
    ]
];

$data_bmi = [];
foreach ($data as $d) {
    // $id, $kode, $nama, $tmp_lahir, $tgl_lahir, $email, $gender;
    $pasien = new Pasien($d["id"], $d["kode"], $d["nama"], $d["tmp_lahir"], $d["tgl_lahir"], $d["email"], $d["gender"],);
    // $berat, $tinggi
    $bmi = new BMI($d["berat"], $d["tinggi"] / 100);
    //$id, BMI $bmi, $tanggal, Pasien $pasien
    $data_bmi[] = new BMIPasien($d["id"], $bmi, $d["tgl_periksa"], $pasien);
}
var_dump($data_bmi);

echo "<hr>";
echo $data_bmi[0]->bmi->nilaiBMI() . "<br>";
echo $data_bmi[0]->bmi->statusBMI() . "<br>";
