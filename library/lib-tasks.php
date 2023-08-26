<?php 

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
function AddFolders(){
  global $pdo;
   $sql="SELECT * from folders";
   $stmt=$pdo->prepare($sql);
   $stmt->execute();
   $recored=$stmt->fetchAll(PDO::FETCH_OBJ);
  return $recored;
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
  
