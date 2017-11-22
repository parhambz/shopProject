<?php
require '../includes/config.php';
$categoryId= filter_input(INPUT_GET, "categoryId");
$pro = $category->showCatProduct($categoryId);
?>
<html>
    <body>
        <?php
        if (!count($pro)==0){
        echo'<ol type="1">';
            echo '<h2>Products: </h2><br>';
            foreach ($pro as $p) {
                echo "<li>" ." <a href ='".$mainfolder."product/showproduct.php?proId=".$p['id']."'>".$p['name']."</a>". "</li>";
                echo "<h3>price : ".$p['price']." تومان</h3>";
                if(!$p['off']==0){
                echo "<h3>price2 : ".(1-($p['off']/100))*($p['price'])." تومان</h3>";
                echo "<h3>off : ".$p['off']." %</h3>";
                }
                echo "<br>";
            }
           
        echo'</ol>';}
        else{
            $generic->addFlashMsg("this category is empty !");
            echo $generic->showFlashMsg();
        }
       ?>
    </body>
</html>
 