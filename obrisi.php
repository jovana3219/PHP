<?php
require 'baza.php';
require "models/proizvod.php";

$proizvod = trim($_POST['proizvod']);

if(Proizvod::obrisi($proizvod, $con)){
    echo "Proizvod je obrisan iz menija";
}else{
    echo "Server ne može da obriše proizvod";
}
