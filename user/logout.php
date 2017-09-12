<?php
require __dir__.'/../includes/config.php';
$user->logout();

$generic->redirect("../index.php");
