<?php
require 'includes/config.php';
?>
<html>
    <body>
     
        <ol type="1">
            <?php
            $pro = $product->getallproducts();
            echo '<h2>Products: </h2><br>';
            foreach ($pro as $p) {
                echo "<li>" ." <a href ='product/showproduct.php?proId=".$p['id']."'>".$p['name']."</a>". "</li>";
                echo "<br>";
            }
            ?>
        </ol>
    </body>
</html>
