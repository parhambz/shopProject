<?php
class product {

    function addProduct($name, $description, $price, $sku, $userid,$categoryId) {
        global $db;
        $query = "INSERT INTO product SET name=:name ,description=:description ,price=:price ,sku=:sku , userid=:userid,categoryId=:categoryId";
        $stmt = $db->prepare($query);
        $res = $stmt->execute([
            ':name'=>$name,
            ':description'=>$description,
            ':price'=>$price,
            ':sku'=>$sku,
            ':userid'=>$userid,
            ':categoryId'=>$categoryId,
        ]);
        if ($res === false&&$stmt->errorcode()==23000){
            return -1;
            
        } 
    
        if ($res === false) {
            var_dump($stmt->errorinfo());
            echo "<br>";
            echo$query;
            exit();
        }
        return $db->lastinsertid();
    }

    function validateProduct($name, $description, $price, $sku) {
        $errors = [];
        if ($sku === FALSE) {
            $errors[] = "invalid sku";
        }
        if (strlen($name)<= 1) {
            $errors[] = "invalid name";
        }
        if (strlen($description)<= 1) {
            $errors[] = "invalid description";
        }
        if ($price <= 0) {
            $errors[] = "invalid price";
        }
        if (strlen($sku) !== 5) {
            $errors[] = "invalid price";
        }

        return $errors;
    }
    function getMyProduct ($id){
        global $db;
        $query="SELECT * FROM product WHERE userid=:id";
        $stmt=$db->prepare($query);
        $res=$stmt->execute([':id'=>$id]);
        if($res===FALSE){
            var_dump($stmt->errorinfo());
            echo '<br>';
            echo $query;
            exit();
        }
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    function getProductInfo($id){
        global $db;
        $query="SELECT * FROM product WHERE id=:id";
        $stmt=$db->prepare($query);
        $res=$stmt->execute([':id'=>$id]);
        if($res===FALSE){
            var_dump($stmt->errorinfo());
            echo '<br>';
            echo $query;
            exit();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }
    function getAllProducts(){
        global $db;
        $query="SELECT * FROM product";
        $stmt=$db->prepare($query);
        $res=$stmt->execute();
        if($res===FALSE){
            var_dump($stmt->errorinfo());
            echo '<br>';
            echo $query;
            exit();
        }
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    function editProduct($id,$name,$description,$price,$sku,$categoryId){
        global $db;
        $query="UPDATE product SET name=:name ,description=:description ,price=:price ,sku=:sku,categoryId=:categoryId WHERE id=$id";
        $stmt = $db->prepare($query);
        $res = $stmt->execute([
            ':name'=>$name,
            ':description'=>$description,
            ':price'=>$price,
            ':sku'=>$sku,
            ':categoryId'=>$categoryId]);
        if ($res === false&&$stmt->errorcode()==23000){
            return -1;
            
        } 
    
        if ($res === false) {
            var_dump($stmt->errorinfo());
            echo "<br>";
            echo$query;
            exit();
        }
        return $id;
    }
    function deleteProduct($proId){
        global $db;
        global $generic;
        $query="DELETE FROM product WHERE id=:proId";
        $stmt=$db->prepare($query);
        $res=$stmt->execute(['proId'=>$proId]);
   $generic->addFlashMsg("Prodect deleted"); 
        
        if($res===FALSE){
            var_dump($stmt->errorinfo());
            echo "<br>";
            echo$query;
            exit();
        } 
        
    }
}
