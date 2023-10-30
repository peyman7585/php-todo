<?php
defined('BASE_PATH') OR die('permision denied');
function getCurrendUseId(){
    return 1;
  }
function login($user,$password){
    return 1;
}
function isLoggedIn(){
    return false;
}
function register($userData){
    global $pdo;
    
    
       $uppercase = preg_match('@[A-Z]@', $userData['password']);
       $lowercase = preg_match('@[a-z]@', $userData['password']);
       $number    = preg_match('@[0-9]@', $userData['password']);
       if(!$uppercase || !$lowercase || !$number || strlen($userData['password']) < 8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
      }
      $passHash=password_hash($userData['password'],PASSWORD_BCRYPT);
     
      
     $sql="INSERT INTO `users`(name,email,password ) VALUES (:name,:email,:pass) ";
     $stmt=$pdo->prepare($sql);
     $stmt->execute([':name'=>$userData['name'],':email'=>$userData['email'],':pass'=>$passHash]);
     return $stmt->rowCount() ? true : false;
      
      
  
}