<?php

require 'baza.php';
require "models/tip.php";

$niz = Tip::vrati($con);

foreach ($niz as $tip) {
?>
<option value="<?= $tip->tipID ?>"><?= $tip->nazivTipa?></option>
<?php
}