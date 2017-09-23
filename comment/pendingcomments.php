<?php
require '../includes/config.php';
if(!$user->isAdmin($_SESSION['user'])){
    $generic->redirect("../index.php");
}
$comments=$comment->getStatusedComments(0);
if(!isset($comments[0])){
    $generic->addFlashMsg("No pending comment");
   echo $generic->showFlashMsg();
}
?>
<html>
    <body><ol>

            <?php
            foreach ($comments as $c) {
                echo '<li>'.$c['text'].'</li>';
                echo '<br><a href="validate.php?id='.$c['id'].'">validate </a>';
                echo '<br><a href="reject.php?id='.$c['id'].'"> reject</a>';
            }
            ?>
        </ol>
    </body>
</html>