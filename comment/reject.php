<?php
require '../includes/config.php';
if(!$user->isAdmin($_SESSION['user'])){
    $generic->redirect("../index.php");
}
$commentId= filter_input(INPUT_GET, "id");
$comment->setStatusReject($commentId);
$generic->redirect("pendingcomments.php");


