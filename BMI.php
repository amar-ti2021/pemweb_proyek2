<?php
class BMI
{
    public $berat, $tinggi;

    public function __construct($berat, $tinggi)
    {
        $this->berat = $berat;
        $this->tinggi = $tinggi;
    }

    public function nilaiBMI()
    {
        return $this->berat / ($this->tinggi * $this->tinggi);
    }

    public function statusBMI()
    {
        $nilai_bmi = $this->nilaiBMI();
        if ($nilai_bmi < 18.5) {
            return "Kekurangan berat badan";
        } elseif ($nilai_bmi < 24.9) {
            return "Normal (ideal)";
        } elseif ($nilai_bmi < 29.9) {
            return "Kelebihan berat badan";
        } elseif ($nilai_bmi > 30.0) {
            return "Kegemukan (Obesitas)";
        }
    }
}
