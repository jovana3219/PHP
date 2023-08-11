<?php
require 'baza.php';
require "models/proizvod.php";

$proizvod = trim($_POST['proizvod']);
$naziv = trim($_POST['naziv']);
$tip = trim($_POST['tip']);
$cena = trim($_POST['cena']);


if(Proizvod::izmeni($proizvod, $naziv, $tip, $cena, $con)){
    echo "Proizvod iz menija je izmenjen";
}else{
    echo "Server ne može da izmeni proizvod";
}
