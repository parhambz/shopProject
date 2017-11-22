<?php

require '../includes/config.php';
if(!$user->isAdmin($_SESSION['user'])){
    $generic->redirect("../index.php");
}
$comments=$comment->getStatusedComments(2);
if(!isset($comments[0])){
    $generic->addFlashMsg("No rejected comment");
   echo $generic->showFlashMsg();
}
?>
<html>
    <body><ol>

            <?php
            foreach ($comments as $c) {
                echo '<li><a href="showcommentdetail.php?id='.$c['id'].'">'.$c['id'].'</a></li>';
                echo '<br><a href="validate.php?id='.$c['id'].'">validate </a>';
               
            }
            ?>
        </ol>
    </body>
</html>