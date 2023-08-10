<?php

require 'baza.php';
require "models/proizvod.php";

$niz = Proizvod::vrati($con);

foreach ($niz as $proizvod) {
?>
<option value="<?= $proizvod->proizvodID ?>"><?= $proizvod->nazivTipa . " " . $proizvod->naziv?></option>
<?php
}