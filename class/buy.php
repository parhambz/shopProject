<?php

class buy {

    // function addToCart($proId,$n,$userId){
    //     global $mainfolder;
    //     global $domain;
    //     $cart[$userId]= filter_input(INPUT_COOKIE, "cart");
    //     if (!isset($cart[$proId])){
    //         $cart[$proId]=$n;
    //     setcookie(cart, $cart, time()+(3600*24*7), $mainfolder,".".$domain,FALSE,TRUE);
    //     } else {
    //     $cart[$proId]+=$n;
    //    setcookie(cart, $cart, time()+(3600*24*7), $mainfolder,".".$domain,FALSE,TRUE);
    //   }
    function addToCart($proId, $n) {
        $cart = $_SESSION['cart'];
        foreach ($cart as $key => $c) {
            if ($c[0] == $proId) {
                if (($c[1] + $n) >= 0) {
                    $_SESSION['cart'][$key][1] += $n;
                }
                $check = 1;
            }
        }
        if (!isset($check)) {
            $_SESSION["cart"][] = [$proId, $n];
        }
    }
    function clearCart(){
        unset($_SESSION['cart']);
    }

}
