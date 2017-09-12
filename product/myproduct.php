<?php
require __dir__.'/../includes/config.php';
if(!$user->islogin()){
    $generic->redirect("../index.php");
}
$id=$_SESSION['user'];
$p=$product->getmyproduct($id);
foreach ($p as $pro){
    echo "<h3>".$pro['name']."</h3>";
    $proId=$pro['id'];
    echo '<a href="showproduct.php?proId='.$proId.'">show</a>';
    echo"<br>";
}
