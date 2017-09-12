 <?php
$mainfolder="/shop/";
        if (isset($_SESSION['user'])) {

            echo"<li><a href='".$mainfolder."user/logout.php'>Logout</a></li>";
            echo"<li><a href='".$mainfolder."product\myproduct.php'>My Products</a></li>";
            echo"<li><a href='".$mainfolder."product/addproduct.php'>Add Product</a></li>";
        } else {
            echo "<li><a href='".$mainfolder."user/adduser.php'>Add user</a></li>" ;
            echo"<li><a href='".$mainfolder."user/login.php'>Login</a></li>";
        }?>
<li><a href='<?= $mainfolder ?>category/showcategory.php'>category</a></li>
<li><a href='<?= $mainfolder ?>'>Home</a></li>
       
