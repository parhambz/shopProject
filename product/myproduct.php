<?php

require __dir__ . '/../includes/config.php';
if (!$user->islogin() or ! $_SESSION['rank'] == 2) {
    $generic->redirect("../index.php");
}
$id = $_SESSION['user'];
$pro = $product->getmyproduct($id);
if (!count($p) == 0) {
    foreach ($pro as $p) {
        echo "<h3>" . $p['name'] . "</h3>";
        echo "<h3>price : " . $p['price'] . " تومان</h3>";
        if (!$p['off'] == 0) {
            echo "<h3>price2 : " . (1 - ($p['off'] / 100)) * ($p['price']) . " تومان</h3>";
            echo "<h3>off : " . $p['off'] . " %</h3>";
        }
        $proId = $p['id'];
        echo '<a href="showproduct.php?proId=' . $proId . '">show</a>';
        echo"<br>";
    }
} else {
    $generic->addFlashMsg("no product !");
    echo $generic->showFlashMsg();
}