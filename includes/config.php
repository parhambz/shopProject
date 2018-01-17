<?php

session_start();
ob_start();


$username = "root";
$password = "";
$dbname = "shop";
$db = new PDO("mysql:dbname=$dbname;host=127.0.0.1", $username, $password);

$salt="fZwQnH&QE|qtJ,Mc[OJ8Vurpr/M##x|wgCY Ki<^lQwvHawPyUtKK.XEY}gP";

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

if(!$user->isLogIn()){
    if (isset($_COOKIE['user'])){
        $pass= filter_input(INPUT_COOKIE, "password");
        $email=filter_input(INPUT_COOKIE, "email");
        $user->login($email, $pass);
    }
}
   
register_shutdown_function(function () {
    $content = ob_get_clean();
    require __dir__ . '/../template/layout01.php';
});

echo $generic->showFlashMsg();
