<?php

require_once "vendor\autoload.php";

use App\Model\Clothing;
use App\Model\Electronic;

$productC = new Clothing();
$productE = new Electronic();

$productC->findAll();
$productE->findAll();
var_dump($productC->findAll());


?>