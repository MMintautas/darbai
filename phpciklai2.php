<?php
$maxIteracijos = 0;
$maxskaicius = 0;
$maxIteracijuskaicius = 0;
$minIteracijos = PHP_INT_MAX; // Paiims didziausia integer reiksme 
$minIteracijuskaicius = 0;
//for ciklas kuris prades intervala nuo 20 iki 200
for ($i = 20; $i <= 200; $i++) {
    /*idedamas skaiciuojamas skaicius i $skaicius reiksme is for ciklo
    prades nuo 20 ir dides iki 200
    */
    $skaicius = $i;
    //iteraciju skaicius
    $iteracijos = 0;
    //skaiciaus skaiciavimas
    while ($skaicius != 1) {
        if ($skaicius % 2 == 0) {
            $skaicius = $skaicius / 2;
        } else {
            $skaicius = 3 * $skaicius + 1;
        }
        //pabaigs skaiciavima padidins iteracija per viena iki tol kol pabaigs skaiciavimus
        $iteracijos++;
    }

    // Patikrina kokia yra maksimali iteracija ir atnaujina skaicius
    if ($iteracijos > $maxIteracijos) {
        $maxIteracijos = $iteracijos;
        $maxIteracijuskaicius = $i;
    }

     // Patikrina kokia yra minimali iteracija ir atnaujina skaicius
    if ($iteracijos < $minIteracijos) {
    $minIteracijos = $iteracijos;
    $minIteracijuskaicius = $i;

}
    // Patikrina kokia yra maksimali reiksme ir atnaujina skaicius
    if ($skaicius > $maxskaicius) {
        $maxskaicius = $skaicius;
        $maxIteracijuskaicius2 = $iteracijos;
    }
}

// Isveda rezultata
print "Skaičius su maksimalia verte: $maxskaicius (Iteraciju skaicius: $maxIteracijuskaicius2)\n";
print "Skaičius su daugiausiai iteraciju: $maxIteracijuskaicius (Iteraciju skaicius: $maxIteracijos)\n";
print "Skaicius su maziausiai iteraciju: $minIteracijuskaicius (Iteraciju skaicius: $minIteracijos)\n";
?>