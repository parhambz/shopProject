<?php
require __dir__.'/../includes/config.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
if($user->islogin()){
    $generic->redirect("../index.php");  
}
if ($generic->ispost()) {
    $firstname = filter_input(INPUT_POST, "firstname",FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, "lastname",FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email",FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password");
    $errors = $user->validateUser($email, $password, $firstname, $lastname);

    if (count($errors) == 0) {
        $id = $user->adduser($firstname, $lastname, $email, $password);
        if ($id == -1) {
            $generic->addFlashMsg("this eamil is taken!");
            echo $generic->showFlashMsg();
        } else {
            $info = $user->getUserInfo($id);
            echo "<h3>" . $info['firstname'] . " " . $info['lastname'] . " " . "added" . "</h3>";
        }
    }

    foreach ($errors as $error) {
        echo "<h3>" . $error . "<br>" . "</h3>";
    }
}

?>


<html>
    <body>
        <form method="POST">
            <label>Firstname : <input name="firstname"></label><br>
            <label>Lastname : <input name="lastname"></label><br>
            <label>Email : <input type="email" name="email"></label><br>
            <label>Password : <input type="password" name="password"></label><br>
            <input type="submit" value="Creat">
        </form>
    </body>
</html>