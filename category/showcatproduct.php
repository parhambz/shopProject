<?php
require '../includes/config.php';
$categoryId= filter_input(INPUT_GET, "categoryId")
?>
<html>
    <body>
     
        <ol type="1">
            <?php
            $pro = $category->showCatProduct($categoryId);
            echo '<h2>Products: </h2><br>';
            foreach ($pro as $p) {
                echo "<li>" ." <a href ='".$mainfolder."product/showproduct.php?proId=".$p['id']."'>".$p['name']."</a>". "</li>";
                echo "<br>";
            }
            ?>
        </ol>
    </body>
</html>
 