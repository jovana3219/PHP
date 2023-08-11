<?php
require 'baza.php';
require "models/proizvod.php";

$naziv = trim($_POST['naziv']);
$tip = trim($_POST['tip']);
$cena = trim($_POST['cena']);

if(Proizvod::dodaj($naziv, $tip, $cena, $con)){
    echo "Proizvod je unet u meni";
}else{
    echo "Server ne može da zapamti proizvod";
}
