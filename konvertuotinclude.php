<?php
//includinamas konvertuot.php kodas
include 'konvertuot.php';
//naudojamas get metodas gauti duomenys ir juos issiusti
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pradzia = isset($_GET["pradzia"]) ? (int)$_GET["pradzia"] : 0;
    $pabaiga = isset($_GET["pabaiga"]) ? (int)$_GET["pabaiga"] : 0;
    $vienas = isset($_GET["vienas"]) ? (int)$_GET["vienas"] : 0;
    
    //iskviecia funckija su vartotojo ivestas skaiciais
    collatz($vienas);
   //iskviecia funckija su vartotojo ivestas skaiciais
    kazkas($pradzia, $pabaiga);
}
//viena skaiciaus skaiciavimo funkcija
function collatz($vienas) {
    $iteracijos = 0;
    $masyvas=array();
    while ($vienas != 1) {
        $masyvas[]=$vienas;
        // Spausdiname esamą skaičių
        echo $vienas . ' ';

        // Atnaujiname skaičių pagal matematinę funkciją
        if ($vienas % 2 == 0) {
            $vienas = $vienas / 2;
        } else {
            $vienas = 3 * $vienas + 1;
        }

        // Didiname iteracijų skaitliuką
        $iteracijos++;
    }
    $masyvas[]=$vienas;
    // Spausdiname paskutinę reikšmę ir iteracijų skaičių

    echo $vienas . ' Iteracijų skaičius: ' . $iteracijos . "<br>\n";

    echo 'Skaiciai irasyti i masyva: ' . implode(',', $masyvas) . "\n";
  
}
//min max intervalo skaiciavimo funckija
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
    }// sukuriama nauja arabtoroma klase
    $konvertuok = new arabtoroma();

    // konvertuoja skaicius i romeniskus
    $maxskaic = $konvertuok->integerToRoman($maxskaicius);
    $maxIteracijuskaicius2roma = $konvertuok->integerToRoman($maxIteracijuskaicius2);
    $maxiterac =$konvertuok -> integerToRoman($maxIteracijuskaicius);
    $miniterac =$konvertuok -> integerToRoman($minIteracijuskaicius);
    $maxiterac2 =$konvertuok -> integerToRoman($maxIteracijos);
    $miniterac2 =$konvertuok -> integerToRoman($minIteracijos);

    //isveda atsakyma
    echo "<br>Skaičius su maksimalia verte: $maxskaic (Iteraciju skaicius: $maxIteracijuskaicius2roma)\n";
    echo "<br>Skaičius su daugiausiai iteraciju: $maxiterac (Iteraciju skaicius: $maxiterac2)\n";
    echo "<br>Skaicius su maziausiai iteraciju: $miniterac (Iteraciju skaicius: $miniterac2)\n";
}
?>