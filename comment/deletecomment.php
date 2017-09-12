<?php
require __dir__.'/../includes/config.php';
if (!$user->islogin()){
    $generic->redirect("../index.php");
} 
  
$commentId= filter_input(INPUT_GET, "commentId");
$com=$comment->getCommentInfo($commentId);

if ($_SESSION['user']==$com['userId']){
    $comment->deletecomment($commentId);
    $generic->addFlashMsg("Comment deleted");  
    $generic->redirect("../index.php");
}