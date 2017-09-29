<?php
require '../includes/config.php';
$proId= filter_input(INPUT_GET, "proId");
$n= filter_input(INPUT_GET, "n");

$buy->addToCart($proId,$n);
$generic->refer();