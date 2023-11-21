<?php
defined('BASE_PATH') OR die('permision denied');
function getCurrendUseId(){
    return GetLoggedInUser()->id ?? 0;
  }
function GetUserByEmail($email){

   global $pdo;
 
   $sql="SELECT * FROM `users` WHERE email=:email";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([':email'=>$email]);
    $recored=$stmt->fetchAll(PDO::FETCH_OBJ);
   return $recored[0] ?? null;
}

function logout(){
  unset($_SESSION['login']);
}

function login($email,$password){
   $user=GetUserByEmail($email);
    if(is_null($user)){
      return false;
    }
    if(password_verify($password,$user->password)){
  # login is successfull
 
  $user->image="https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) );
      $_SESSION['login']=$user;
      return true;
    }
    return false;
}

function isLoggedIn(){

    return isset($_SESSION['login']) ? true :false;
}

function GetLoggedInUser(){
  return $_SESSION['login'] ?? null;
}

function register($userData){
    global $pdo;
    
    
      //  $uppercase = preg_match('@[A-Z]@', $userData['password']);
      //  $lowercase = preg_match('@[a-z]@', $userData['password']);
      //  $number    = preg_match('@[0-9]@', $userData['password']);
      //  if(!$uppercase || !$lowercase || !$number || strlen($userData['password']) < 8) {
      //   echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
      // }
      $passHash=password_hash($userData['password'],PASSWORD_BCRYPT);
     
      
     $sql="INSERT INTO `users`(name,email,password ) VALUES (:name,:email,:pass) ";
     $stmt=$pdo->prepare($sql);
     $stmt->execute([':name'=>$userData['name'],':email'=>$userData['email'],':pass'=>$passHash]);
     return $stmt->rowCount() ? true : false;
      
      
  
}