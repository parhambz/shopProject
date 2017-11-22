<?php
require '../includes/config.php';
if(!$user->isAdmin($_SESSION['user'])){
    $generic->redirect("../index.php");
}
$commentId= filter_input(INPUT_GET, 'id');
$detail=$comment->getCommentInfo($commentId);

echo '</br>comment id :'.$detail['id'];
echo '</br>comment user :'.$detail['userId'];
echo '</br>comment text :'.$detail['text'];
echo '</br>comment time :'.$detail['dt'];
echo '</br>comment product :'.$detail['productId'];
echo '</br>comment reply :'.$detail['replyId'];
echo '</br>comment status :'.$detail['status'];
echo"</br>";
echo '<br><a href="validate.php?id='.$commentId.'">validate </a>';
echo '<br><a href="reject.php?id='.$commentId.'"> reject</a>';
?>
