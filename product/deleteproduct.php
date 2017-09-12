<?php
require __dir__.'/../includes/config.php';
if (!$user->islogin()){
    $generic->redirect("../index.php");
} 
$proId= filter_input(INPUT_GET, "proId");
$pro=$product->getproductinfo($proId);

if ($_SESSION['user']==$pro['userid']){
    $product->deleteProduct($proId);
    $generic->addFlashMsg("Product deleted");  
    $generic->redirect("../index.php");
}