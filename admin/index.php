<?php
require '../includes/config.php';
if(!$user->isAdmin($_SESSION['user'])){
    $generic->redirect("../index.php");
}

?>
<html>
    <body>
        <a href="../product/addproduct.php">add product</a><br>
        <a href="../product/showallproduct.php">products</a><br>
        <a href="../comment/pendingcomments.php">pending comments</a><br>
        <a href="../comment/rejectedcomments.php">rejected comments</a><br>
        
        
    </body>
    
</html>