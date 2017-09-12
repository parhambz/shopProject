<?php
require __dir__.'/../includes/config.php';
    
if ($user->islogin()) {
    $userId = $_SESSION['user'];
} else {
$generic->redirect("../index.php");
$generic->addFlashMsg("Please log in first");
}
$proId = filter_input(INPUT_POST, "proId");
$replyId = 0;

$commentTxt = filter_input(INPUT_POST, "commentTxt");
if ($comment->validatecomment($commentTxt)) {
        $cid = $comment->addComment($commentTxt, $userId, $proId, $replyId);
        $url="../product/showproduct.php?proId=".$proId;
        $generic->addFlashMsg("Comment added");
        $generic->redirect($url);
        
    }