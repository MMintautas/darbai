<?php
//includinamos funkcijos is funckija.php failo
include 'funkcija.php';
//naudojamas get metodas persiusti duomenys 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pradzia = isset($_GET["pradzia"])? (int)$_GET["pradzia"] : 0;;
    $pabaiga = isset($_GET["pabaiga"])? (int)$_GET["pabaiga"] : 0;;
    $vienas = isset($_GET["vienas"])? (int)$_GET["vienas"] : 0;;
 
}
//Iskvieciamos funkcijos 
collatz($vienas);
kazkas($pradzia, $pabaiga);

?>