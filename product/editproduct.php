<?php
require __dir__ . '/../includes/config.php';
$proId = filter_input(INPUT_GET, "proId");
$pro = $product->getProductInfo($proId);
if (!$user->islogin()) {
    $generic->redirect("../index.php");
}

if (!$user->isAdmin($_SESSION['user'])) {
    $generic->redirect("../index.php");
}
$name = $pro['name'];
$description = $pro['description'];
$price = $pro['price'];
$sku = $pro['sku'];
$categoryId = $pro['categoryId'];
if ($generic->ispost()) {
    $name = filter_input(INPUT_POST, "name");
    $description = filter_input(INPUT_POST, "description");
    $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
    $sku = filter_input(INPUT_POST, "sku", FILTER_SANITIZE_NUMBER_INT);
    $categoryId = filter_input(INPUT_POST, "category", FILTER_SANITIZE_NUMBER_INT);
    $errors = $product->validateProduct($name, $description, $price, $sku);
    if (count($errors) == 0) {
        $a = $product->editProduct($proId, $name, $description, $price, $sku, $categoryId);
        $generic->redirect("showproduct.php?proId=" . $proId);
        if ($a == -1) {
            echo 'duplicate sku';
        }
    } else {
        foreach ($errors as $e) {
            echo "<h3>" . $e . "</h3>";
        }
    }
}
$categoryAll = $category->getAllCategory();
?>
<html>
    <body>
        <form method="POST">

            <label>Name : <input name="name" value=<?php echo $name; ?>></label><br>
            <label>Description : <textarea rows="10" cols="50" name="description" type="text" ><?= $description ?></textarea></label><br>
            <label>Price : <input name="price" type="number" value=<?php echo $price; ?> ></label><br>
            <label>SKU : <input name="sku" type="number" value=<?php echo $sku; ?>></label><br>
            <label>Picture : <input name="picture" type="file"></label><br>
            <label>Category : <select name="category" >
                    <?php
                    foreach ($categoryAll as $cat) {
                        if($categoryId==$cat['id']) {
                            echo '<option value="' . $cat["id"] . '" selected>' . $cat["name"] . '</option>';
                        } else {

                            echo '<option value="' . $cat["id"] . '">' . $cat["name"] . '</option>';
                        }
                    }
                    ?>
                </select></label><br>
            <input type="submit" value="Done">

        </form>
    </body>


</html>