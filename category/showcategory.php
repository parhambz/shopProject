<?php
require '../includes/config.php';
$categories=$category->getAllCategory();
echo '<ul>';
foreach ($categories as $cat){
    echo'<li><a href="showcatproduct.php?categoryId='.$cat["id"].'">'.$cat["name"].'</a></li>';
}
echo '</ul>';