<?php
require __dir__ . '/../includes/config.php';
if (!$user->islogin()) {
    $generic->redirect("../index.php");
    $userid = $_SESSION['user'];
}
if ($generic->ispost()) {
    $name = filter_input(INPUT_POST, "name");
    $description = filter_input(INPUT_POST, "description");
    $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
    $sku = filter_input(INPUT_POST, "sku", FILTER_SANITIZE_NUMBER_INT);
    $categoryId = filter_input(INPUT_POST, "category", FILTER_SANITIZE_NUMBER_INT);
    $userid = $_SESSION['user'];
    $errors = $product->validateproduct($name, $description, $price, $sku);
    if (count($errors) == 0) {
        $id = $product->addProduct($name, $description, $price, $sku, $userid,$categoryId);
        if ($id == -1) {
            echo "duplicate sku";
        } else {
            $generic->redirect("../index.php");
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
        <form method="POST" enctype="multipart/form-data">
            <label>Name : <input name="name"></label><br>
             <label>Description : <textarea rows="10" cols="30" name="description" type="text" ></textarea></label><br>
            <label>Price : <input name="price" type="number"></label><br>
            <label>SKU : <input name="sku" type="number"></label><br>
            <label>Picture : <input name="picture" type="file"></label><br>
            <label>Category : <select name="category">
                    <?php
                    foreach ($categoryAll as $cat) {
                        echo '<option value="' . $cat["id"] . '">' . $cat["name"] . '</option>';
                    }
                    ?>
                </select></label><br>
            <input type="submit" value="Done">
        </form>
    </body>
</html>