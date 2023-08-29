<?php 
// if(!defined('BASE_PATH')){
//   echo 'permision denied';
//   die();
// }
defined('BASE_PATH') OR die('permision denied');

//***folder function ***/
function DeleteFolder($folder_id){
  global $pdo;

   $sql="DELETE from folders where id=$folder_id";
   $stmt=$pdo->prepare($sql);
   $stmt->execute();
 
  return $stmt->rowCount();
}

function getFolders(){
  global $pdo;
  $currend_use_id=getCurrendUseId();

   $sql="SELECT * from folders where user_id=$currend_use_id";
   $stmt=$pdo->prepare($sql);
   $stmt->execute();
   $recored=$stmt->fetchAll(PDO::FETCH_OBJ);
  return $recored;
}
function AddFolders($folder_name){
  global $pdo;
  $currend_use_id=getCurrendUseId();
   $sql="INSERT INTO `folders`(name,user_id ) VALUES (:folder_name,:user_id) ";
   $stmt=$pdo->prepare($sql);
   $stmt->execute(['folder_name'=>$folder_name,'user_id'=>$currend_use_id]);
   return $stmt->rowCount();
}


//**task function** *//
function getTasks(){
  return 1;
  }
  
function AddTasks(){
  return 1;
  }
  
function DeleteTasks(){
  return 1;
  }
  
