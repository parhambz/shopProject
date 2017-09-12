   <?php
        if ($user->islogin()) {

            echo"<a href='user/logout.php'>Logout</a>" . " ";
            echo"<a href='product/myproduct.php'>My Products</a>" . " ";
            echo"<a href='product/addproduct.php'>Add Product</a>" . " ";
        } else {
            echo "<a href='user/adduser.php'>Add user</a>" . " ";
            echo"<a href='user/login.php'>Login</a>";
        }
        $pro = $product->getallproducts();

        
        ?>