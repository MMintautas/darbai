<?php
function collatz($skaicius) {
    $iteracijos = 0;

    while ($skaicius != 1) {
        // Spausdiname esamą skaičių
        print $skaicius . ' ';

        // Atnaujiname skaičių pagal matematinę funkciją
        if ($skaicius % 2 == 0) {
            $skaicius = $skaicius / 2;
        } else {
            $skaicius = 3 * $skaicius + 1;
        }

        // Didiname iteracijų skaitliuką
        $iteracijos++;
    }

    // Spausdiname paskutinę reikšmę ir iteracijų skaičių
    print $skaicius . ' ';
    print 'Iteracijų skaičius: ' . $iteracijos;
}

// Pabandykime su vienu pradiniu skaičiumi, pavyzdžiui, 27
collatz(27);

?>