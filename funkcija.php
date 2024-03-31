<?php
function collatz($vienas) {
    $iteracijos = 0;
    //sukuriamas masyvas
    $masyvas=array();
    while ($vienas != 1) {
        $masyvas[]=$vienas;
        // Spausdiname esamą skaičių
        echo $vienas . ' ';

        // tikriname ar skaicius yra lyginis ar ne
        if ($vienas % 2 == 0) {
            $vienas = $vienas / 2;
        } else {
            $vienas = 3 * $vienas + 1;
        }

        // Didiname iteracijų skaiciu
        $iteracijos++;
    }
    //Idedame gautas reiksmes i masyva
    $masyvas[]=$vienas;

    echo $vienas . ' Iteracijų skaičius: ' . $iteracijos . "<br>\n";
    //Isvedame visas reiksmes esancias masyve
    echo 'Skaiciai irasyti i masyva: ' . implode(',', $masyvas) . "\n";
  
}
//sukurta funkcija, kurios pavadinimas "kazkas"
function kazkas($pradzia, $pabaiga) {
    $maxIteracijos = 0;
    $maxskaicius = 0;
    $maxIteracijuskaicius = 0;
    $minIteracijos = PHP_INT_MAX;
    $minIteracijuskaicius = 0;
    //For ciklas sukasi tarp ivesto intervalo ribu
    for ($i = $pradzia; $i <= $pabaiga; $i++) {
        $skaicius = $i;
        $iteracijos = 0;
        //ciklas suksis tol kol gautas rez nera 1
        while ($skaicius != 1) {
            //tikrina ar ivestas intervalas lyginis ar ne
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

    print "<br>Skaičius su maksimalia verte: $maxskaicius (Iteraciju skaicius: $maxIteracijuskaicius2)\n";
    print "<br>Skaičius su daugiausiai iteraciju: $maxIteracijuskaicius (Iteraciju skaicius: $maxIteracijos)\n";
    print "<br>Skaicius su maziausiai iteraciju: $minIteracijuskaicius (Iteraciju skaicius: $minIteracijos)\n";
}
?>
