<?php
require '../includes/config.php';
if(!$user->isAdmin($_SESSION['user'])){
    $generic->redirect("../index.php");
}
$commentId= filter_input(INPUT_GET, "id");
$comment->setStatusValidate($commentId);
$generic->redirect("pendingcomments.php");
