<?php
require __dir__.'/../includes/config.php';
$proId = filter_input(INPUT_GET, "proId");
$pro = $product->getProductInfo($proId);
$editurl = "editproduct.php" . "?proId=" . $proId;
$deleteProductUrl = "deleteproduct.php" . "?proId=" . $proId;
$addCommentUrl="../comment/addcomment.php";
$replyId = 0;
$comments = $comment->getCommentsForShow($proId);
if ($user->islogin()) {
    $userId = $_SESSION['user'];
}
if ($generic->ispost()) {
    $commentTxt = filter_input(INPUT_POST, "commentTxt");
    if ($comment->validatecomment($commentTxt)) {
        $cid = $comment->addComment($commentTxt, $userId, $proId, $replyId);
    }
}
?>
<html>
    <body>
        <table>
            <tr>
                <td>name</td>
                <td>description</td>
                <td>price</td>
                <td>sku</td>
                <td>category</td>
                <td>off</td>
            </tr>
            <tr>
                <td><?php echo $pro['name']; ?></td>
                <td><?php echo $pro['description']; ?></td>
                <td><?php echo $pro['price']; ?></td>
                <td><?php echo $pro['sku']; ?></td>
                <td><?php echo $category->getCategoryName($pro['categoryId']); ?></td>
                <td><?php echo $pro['off']; ?></td>
            </tr>

        </table>
        <br>
        <a href="../buy/addtocart.php?proId=<?=$proId?>&n=1">Add to cart</a>
        <?php
        if ($user->islogin()) {
            if ($user->isAdmin($_SESSION['user'])) {
                echo "<a href=$editurl>Edit </a>";
                echo "<a href=$deleteProductUrl> Delete</a>";
            }
        }
        ?>
        <br>
        <h4>Comments</h4><br>
        <ol type="1">
            <?php
            foreach ($comments as $c) {
                $person = $user->getuserinfo($c['userId']);
                $commentId=$c['id'];
                $deleteCommentUrl ="../comment/deletecomment.php" . "?commentId=" . $commentId;
                echo '<li>';
                echo $person['firstname'] . " " . $person['lastname'] . " : " . $c['text'];
                if (isset($_SESSION['user'])) {
                    if ($person['id'] == $_SESSION['user']) {
                        echo '<a href="'.$deleteCommentUrl.'"> Delete</a>';
                    }
                }
                echo '</li>';
            }
            ?>
        </ol>
        <?php
        if ($user->islogin()) {

            echo '   
        <form method="POST" action="'.$addCommentUrl.'">
            <label>Comment :<textarea row="10" cols="30" name="commentTxt"></textarea></label>
            <input type="submit" value="Send">
<input name="proId" type="hidden" value='.$proId.'>
    </form>';
        }
        ?>
    </body>
</html>
