<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pradzia = isset($_GET["pradzia"]) ? (int)$_GET["pradzia"] : 0;
    $pabaiga = isset($_GET["pabaiga"]) ? (int)$_GET["pabaiga"] : 0;

    $maxIteracijos = 0;
    $maxskaicius = 0;
    $maxIteracijuskaicius = 0;
    $minIteracijos = PHP_INT_MAX;
    $minIteracijuskaicius = 0;

    for ($i = $pradzia; $i <= $pabaiga; $i++) {
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

        if ($iteracijos > $maxIteracijos) {
            $maxIteracijos = $iteracijos;
            $maxIteracijuskaicius = $i;
        }

        if ($iteracijos < $minIteracijos) {
            $minIteracijos = $iteracijos;
            $minIteracijuskaicius = $i;
        }

        if ($skaicius > $maxskaicius) {
            $maxskaicius = $skaicius;
            $maxIteracijuskaicius2 = $iteracijos;
        }
    }

    print "<br><br>";
    print "Skaičius su maksimalia verte: $maxskaicius (Iteraciju skaicius: $maxIteracijuskaicius2)<br>";
    print "Skaičius su daugiausiai iteraciju: $maxIteracijuskaicius (Iteraciju skaicius: $maxIteracijos)<br>";
    print "Skaicius su maziausiai iteraciju: $minIteracijuskaicius (Iteraciju skaicius: $minIteracijos)<br>";
}
?>