<?php
class category {
    function getAllCategory(){
        global $db;
        $query="SELECT * FROM category";
        $stmt= $db->prepare($query);
        $res= $stmt ->execute();
    if ($res===FALSE){
        var_dump($stmt->errorInfo());
        echo '<br>';
        echo $query;
        exit();
    }
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    function showCatProduct($categoryId){
        global $db;
        $query="SELECT * FROM product WHERE categoryId=:categoryId";
        $stmt= $db->prepare($query);
        $res= $stmt ->execute([":categoryId"=>$categoryId]);
    if ($res===FALSE){
        var_dump($stmt->errorInfo());
        echo '<br>';
        echo $query;
        exit();
    }
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    function getCategoryName($id){
        global $db;
        $query="SELECT * FROM category WHERE id=:id";
        $stmt=$db->prepare($query);
        $res=$stmt->execute([':id'=>$id]);
        if($res===FALSE){
            var_dump($stmt->errorInfo());
            echo '<br>';
            echo $query;
            exit();
        }
        $cat= $stmt->fetch(PDO::FETCH_ASSOC);
        return $cat['name'];
    }
}