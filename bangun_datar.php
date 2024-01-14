<?php

class Descriptor {
    public static function describe($bangunDatar) {
        $jenisBangunDatar = get_class($bangunDatar);
        $luas = $bangunDatar->area();
        $keliling = $bangunDatar->circumference();
        
        echo "Bangun datar ini adalah $jenisBangunDatar yang memiliki luas $luas dan keliling $keliling dengan PHP." . PHP_EOL;
    }
}

interface BangunDatar {
    public function area();
    public function circumference();
    public function enlarge($scale);
    public function shrink($scale);
}

class Lingkaran implements BangunDatar {
    private $jariJari;

    public function __construct($jariJari) {
        $this->jariJari = $jariJari;
    }

    public function area() {
        return pi() * pow($this->jariJari, 2);
    }

    public function circumference() {
        return 2 * pi() * $this->jariJari;
    }

    public function enlarge($scale) {
        $this->jariJari *= $scale;
    }

    public function shrink($scale) {
        $this->jariJari /= $scale;
    }
}

class Persegi implements BangunDatar {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function area() {
        return pow($this->sisi, 2);
    }

    public function circumference() {
        return 4 * $this->sisi;
    }

    public function enlarge($scale) {
        $this->sisi *= $scale;
    }

    public function shrink($scale) {
        $this->sisi /= $scale;
    }
}

class PersegiPanjang implements BangunDatar {
    private $panjang;
    private $lebar;

    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function area() {
        return $this->panjang * $this->lebar;
    }

    public function circumference() {
        return 2 * ($this->panjang + $this->lebar);
    }

    public function enlarge($scale) {
        $this->panjang *= $scale;
        $this->lebar *= $scale;
    }

    public function shrink($scale) {
        $this->panjang /= $scale;
        $this->lebar /= $scale;
    }
}

// Penggunaan
$lingkaran = new Lingkaran(5);
Descriptor::describe($lingkaran);

$persegi = new Persegi(4);
Descriptor::describe($persegi);

$persegiPanjang = new PersegiPanjang(3, 6);
Descriptor::describe($persegiPanjang);
?>
