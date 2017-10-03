<?php

session_start();
ob_start();

$username = "root";
$password = "";
$dbname = "shop";
$db = new PDO("mysql:dbname=$dbname;host=127.0.0.1", $username, $password);

$mainfolder = "/shop/shopproject/";
$domain = "localhost";

spl_autoload_register(function ($classname) {
    require __dir__ . '/../class/' . $classname . '.php';
});


$user = new user();
$generic = new generic();
$product = new product();
$comment = new comment();
$category = new category();
$buy = new buy();


    $_SESSION['rank']=-1;    
if (isset($_SESSION['user'])) {
    if ($user->isAdmin($_SESSION['user'])) {
        $_SESSION['rank'] = 2;
    }
}

register_shutdown_function(function () {
    $content = ob_get_clean();
    require __dir__ . '/../template/layout01.php';
});

echo $generic->showFlashMsg();
