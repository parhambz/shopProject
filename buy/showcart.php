<?php
require '../includes/config.php';
if(isset($_SESSION['cart'])){
$cart=$_SESSION["cart"];   
?>
<table border="1">
<tr>
    <td>name</td>      
    <td>price X 1</td>      
    <td>number</td>      
    <td>price</td>
</tr>
<?php

$tPrice=0;
foreach ($cart as $c){
echo'<tr>';
$pro=$product->getProductInfo ($c[0]);
echo '<td>'.$pro['name']."</td>";
echo '<td>'.$pro['price']."</td>";
echo '<td>'.$c[1]."</td>";
echo '<td>'.$c[1]*$pro['price']."</td>";
echo '<td><a href="addtocart.php?proId='.$pro["id"].'&n=1">+</a></td>';
echo '<td><a href="addtocart.php?proId='.$pro["id"].'&n=-1">-</a></td>';

echo'</tr>';
$tPrice=$tPrice+($c[1]*$pro['price']);
} 
?>
<tr>
    <td>Products</td>
    <td></td>
    <td></td>
    <td><?=$tPrice?></td>
</tr>
</table>
<a href="clearcart.php">Clear cart</a>
<a href="checkout.php">Check out</a>
<?php }
 else {
     echo '<h3>Your cart is empty</h3>';    
}
?>