<?php
require 'baza.php';
require "models/proizvod.php";

$tip = trim($_GET['tip']);
$cena = trim($_GET['cena']);

$niz = Proizvod::pretrazi($tip, $cena, $con);

if(count($niz)==0){
    echo "Nema stavki menija za prikaz";
}
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 50%">Naziv</th>
                <th style="width: 50%">Cena</th>
            </tr>
        </thead>
    <tbody>

<?php

foreach ($niz as $proizvod) {
    ?>
    <tr>
        <td><?= $proizvod->nazivTipa . " - " . $proizvod->naziv ?></td>
        <td><?= $proizvod->cena . " RSD"?></td>
    </tr>
    <?php
}
?>
    </tbody>
</table>
