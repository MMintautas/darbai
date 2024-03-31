<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pradzia = isset($_POST["pradzia"]) ? (int)$_POST["pradzia"] : 0;
    $pabaiga = isset($_POST["pabaiga"]) ? (int)$_POST["pabaiga"] : 0;
    $vienas = isset($_POST["vienas"]) ? (int)$_POST["vienas"] : 0;
}
class Klase {
    public $pradzia;
    public $pabaiga;
    public $vienas;
    public $maxIteracijos = 0;
    public $maxskaicius = 0;
    public $maxIteracijuskaicius = 0;
    public $minIteracijos = PHP_INT_MAX;
    public $minIteracijuskaicius = 0;
    public $maxIteracijuskaicius2;

    public function __construct($pradzia = 0, $pabaiga = 0, $vienas = 0) {
        $this->pradzia = $pradzia;
        $this->pabaiga = $pabaiga;
        $this->vienas = $vienas;
    }

    public function ivest($pradzia, $pabaiga, $vienas) {
        $this->pradzia = $pradzia;
        $this->pabaiga = $pabaiga;
        $this->vienas = $vienas;
    }

    public function collatz() {
        $iteracijos = 0;

        while ($this->vienas != 1) {
            echo $this->vienas . ' ';

            if ($this->vienas % 2 == 0) {
                $this->vienas = $this->vienas / 2;
            } else {
                $this->vienas = 3 * $this->vienas + 1;
            }

            $iteracijos++;
        }

        echo $this->vienas . ' ';
        echo 'Iteracijų skaičius: ' . $iteracijos. "<br>";
    }

    public function kazkas() {
        for ($i = $this->pradzia; $i <= $this->pabaiga; $i++) {
            $skaicius = $i;
            $iteracijos = 0;

            while ($skaicius != 1) {
                if ($skaicius % 2 == 0) {
                    $skaicius = $skaicius / 2;
                } else {
                    $skaicius = 3 * $skaicius + 1;
                }
                $iteracijos++;
            }

            if ($iteracijos > $this->maxIteracijos) {
                $this->maxIteracijos = $iteracijos;
                $this->maxIteracijuskaicius = $i;
            }

            if ($iteracijos < $this->minIteracijos) {
                $this->minIteracijos = $iteracijos;
                $this->minIteracijuskaicius = $i;
            }

            if ($skaicius > $this->maxskaicius) {
                $this->maxskaicius = $skaicius;
                $this->maxIteracijuskaicius2 = $iteracijos;
            }
        }
    }

    public function isvest() {
        echo "Skaičius su maksimalia verte: {$this->maxskaicius} (Iteraciju skaicius: {$this->maxIteracijuskaicius2})\n";
        echo "Skaičius su daugiausiai iteraciju: {$this->maxIteracijuskaicius} (Iteraciju skaicius: {$this->maxIteracijos})\n";
        echo "Skaicius su maziausiai iteraciju: {$this->minIteracijuskaicius} (Iteraciju skaicius: {$this->minIteracijos})\n";
    }
}
$klaseobj = new Klase($pradzia, $pabaiga, $vienas);
$klaseobj->ivest($pradzia, $pabaiga, $vienas);
$klaseobj->collatz();
$klaseobj->kazkas();
$klaseobj->isvest();
?>