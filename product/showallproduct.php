<?php
require '../includes/config.php';
if(!$user->isAdmin($_SESSION['user'])){
    $generic->redirect("../index.php");
}
$pro = $product->getallproducts();
            echo '<h2>Products: </h2><br>';
            foreach ($pro as $p) {
                echo "<li>" ." <a href ='showproduct.php?proId=".$p['id']."'>".$p['name']."</a>". "</li>";
                echo "<br>";
            }
            ?>