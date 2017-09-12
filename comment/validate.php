<?php
require '../includes/config.php';
$comment=$db->query("SELECT * FROM comment");
$c=$comment->fetchall(PDO::FETCH_ASSOC);
foreach ($c as $com){
$query="UPDATE comment SET status=1 WHERE id=:id";
        $stmt = $db->prepare($query);
        $res = $stmt->execute([':id'=>$com['id']]);
}