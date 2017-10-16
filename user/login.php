<?php
require __dir__.'/../includes/config.php';
if($user->islogin()){
   $generic-> redirect("../index.php");
}
if ($generic->ispost()) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password");
    $remember = (int) filter_input(INPUT_POST, "remember", FILTER_SANITIZE_NUMBER_INT);

    if ($user->login($email, $password) === null) {
        echo "<h3>invalid email or password</h3>";
    } else {
        $id = $user->login($email, $password);
        $user->idtosession($id);
        $generic-> redirect("..\index.php");
        
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST">
            <label>Email : <input type="email" name="email"></label><br>
            <label>Password : <input type="password" name="password"></label><br>
            <label>Remember me : <input type="checkbox" name="remember"></label><br>

            <input type="submit" value="Log in">


        </form>
    </body>
</html>
