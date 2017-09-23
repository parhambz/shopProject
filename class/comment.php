<?php

class comment {

    function validateComment($commentTxt) {
        if (strlen($commentTxt) <= 0) {
            return FALSE;
        } else {
            if (strlen($commentTxt) >=700 ) {
            return FALSE;
        } else {
            
            return TRUE;
    }
        }
    }
    function addComment($commentTxt,$userId,$proId,$replyId){
        global $db;
        $query="INSERT INTO comment SET text=:text , userId=:userId , productId=:proId , replyId=:replyId,status=0";
        $stmt=$db->prepare($query);
        $res=$stmt->execute([
            ':text'=>$commentTxt,   
            ':userId'=>$userId,  
            ':proId'=>$proId,   
            ':replyId'=>$replyId
                ]);
        if($res===FALSE){
            var_dump($stmt->errorinfo());
            echo '<br>';
            echo $query;
            exit();
        }
        return $db->lastinsertid();
    }
    function getCommentsForShow($proId){
        global $db;
        $query="SELECT * FROM comment WHERE status=1 AND productId=:proId";
        $stmt=$db->prepare($query);
        $res=$stmt->execute([':proId'=>$proId]);
        if ($res===FALSE){
            var_dump($stmt->errorinfo());
            echo '<br>';
            echo $query;
        }
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    function deleteComment($commentId){
        global $db;
        global $generic;
        $query="DELETE FROM comment WHERE id=:commentId";
        $stmt=$db->prepare($query);
        $res=$stmt->execute(['commentId'=>$commentId]);
   $generic->addFlashMsg("Comment deleted"); 
        
        if($res===FALSE){
            var_dump($stmt->errorinfo());
            echo "<br>";
            echo$query;
            exit();
        } 
    }
    function getCommentInfo($id){
        global $db;
        $query="SELECT * FROM comment WHERE id=:id";
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
    function setStatusValidate($id){
        global $db;
        $query = "UPDATE comment SET status=1 WHERE id=:id";
    $stmt = $db->prepare($query);
    $res = $stmt->execute([':id' =>$id]);      
    
    if($res===FALSE){
            var_dump($stmt->errorinfo());
            echo '<br>';
            echo $query;
            exit();
        }
        
    }
    function setStatusReject($id){
        global $db;
        $query = "UPDATE comment SET status=2 WHERE id=:id";
    $stmt = $db->prepare($query);
    $res = $stmt->execute([':id' =>$id]);      
    
    if($res===FALSE){
            var_dump($stmt->errorinfo());
            echo '<br>';
            echo $query;
            exit();
        }
        
    }
    function getStatusedComments($status){
         global $db;
        $query="SELECT * FROM comment WHERE status=:status";
        $stmt=$db->prepare($query);
        $res=$stmt->execute([':status'=>$status]);
        if ($res===FALSE){
            var_dump($stmt->errorinfo());
            echo '<br>';
            echo $query;
        }
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
}
