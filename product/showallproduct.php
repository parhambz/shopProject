<?php
require '../includes/config.php';
if(!$user->isAdmin($_SESSION['user'])){
    $generic->redirect("../index.php");
}
$pro = $product->getallproducts();
            echo '<h2>Products: </h2><br>';
            foreach ($pro as $p) {
                echo "<li>" ." <a href ='showproduct.php?proId=".$p['id']."'>".$p['name']."</a>". "</li>";
                 echo "<h3>price : ".$p['price']." تومان</h3>";
                if(!$p['off']==0){
                echo "<h3>price2 : ".(1-($p['off']/100))*($p['price'])." تومان</h3>";
                echo "<h3>off : ".$p['off']." %</h3>";
                }
                echo "<br>";
            }
            ?>