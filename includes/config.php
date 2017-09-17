<?php
session_start();
ob_start();

$username="root";
$password="";
$dbname="shop";
$db= new PDO("mysql:dbname=$dbname;host=127.0.0.1",$username,$password);

$mainfolder="/shop/shopproject/";

spl_autoload_register(function ($classname){
require __dir__.'/../class/'.$classname.'.php';  
});


$user = new user();
$generic = new generic();
$product = new product();
$comment = new comment();
$category = new category();

register_shutdown_function(function (){
$content= ob_get_clean();
require __dir__.'/../template/layout01.php';
});

echo $generic->showFlashMsg();