<?php
class user {
function addUser($firstname,$lastname,$email,$password){
    global $db,$generic;
    $pass= $generic->enc($password);
    $query="INSERT INTO user SET firstname=:firstname , lastname=:lastname,email=:email,password=:password";
$stmt= $db->prepare($query);
$res=$stmt->execute([
     ':firstname'=>$firstname,
     ':lastname'=>$lastname,
     ':email'=>$email,
     ':password'=>$pass
    ]);
 if($res===FALSE && $stmt->errorCode() == 23000){
        return -1;
    }
if ($res === false) {
        var_dump($stmt->errorInfo());
        echo "<br>";
        echo $query;
        exit;
}
return $db->lastinsertid();
}

function login($email,$password){
    global $db,$generic;
    $pass=$generic->enc($password);
    $query="SELECT * FROM user WHERE email=:email AND password=:password";
    $stmt=$db->prepare($query);
    $res=$stmt->execute([
        ":email"=>$email,":password"=>$pass
    ]);
   
   if ($res === false) {
        var_dump($stmt->errorInfo());
        echo "<br>";
        echo $query;
        exit;
    }
   $user= $stmt->fetch(PDO::FETCH_ASSOC);
    if(count($user)!==0){
    return $user;
    }
 else {
    return FALSE;
}
}

function validateUser($email,$password,$firstname,$lastname){
    $errors=[];
    if(strlen($firstname)<=3){
        $errors[]="invalid firstname";
    }
    if(strlen($lastname)<=3){
        $errors[]="invalid lastname";
    }
    if(strlen($password)<=4){
        $errors[]="invalid password";
    }
   
    if($email===false){
        $errors[]="invalid email";
    }
    
    return $errors;
}
function getUserInfo($id){
    global $db;
    $query="SELECT * FROM user  WHERE id=:id";
    $stmt=$db->prepare($query);
   $res= $stmt -> execute([':id'=>$id]);
   if ($res===false){
       var_dump($stmt->errorinfo());
       echo '<br>';
       echo $query;
   exit();}
   
   return $stmt->fetch(PDO::FETCH_ASSOC);
}
function idToSession ($u){
    $_SESSION['user']=$u['id'];
    $_SESSION['rank']=$u['rank'];
}
function logout(){
    unset($_SESSION['user']);
    $_SESSION['rank']=-1;
}
function isLogIn(){
    return isset($_SESSION['user']);
    
}
function isAdmin($id){
    if (isset($_SESSION['user'])){
    $user=$this->getUserInfo($id);
    if($user['rank']==2){
        return TRUE;
    }
}}
}