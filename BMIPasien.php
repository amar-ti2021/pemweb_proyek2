<?php
class BMIPasien
{
    public $id,
        $bmi,
        $tanggal,
        $pasien;
    public function __construct($id, BMI $bmi, $tanggal, Pasien $pasien)
    {
        $this->id = $id;
        $this->bmi = $bmi;
        $this->tanggal = $tanggal;
        $this->pasien = $pasien;
    }
}
