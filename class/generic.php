<?php

class generic {

    function ispost() {
        return filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST";
    }

    function redirect($url) {
        header("Location: $url");
        exit();
    }

    function addFlashMsg($msg) {
        $_SESSION['flashMsg'] = $msg;
    }

    function showFlashMsg() {
        if (isset($_SESSION['flashMsg'])) {
            $msg = "<h4>" . $_SESSION['flashMsg'] . "</h4>";
            unset($_SESSION['flashMsg']);
            return $msg;
        }
    }
    function refer (){
        if (isset($_SERVER['HTTP_REFERER'])){
        $this->redirect($_SERVER['HTTP_REFERER']); 
        }
        $this->redirect("./index.php");
    }
}
