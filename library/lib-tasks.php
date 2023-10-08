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
function AddFolder($folder_name){
  global $pdo;
  $currend_use_id=getCurrendUseId();
   $sql="INSERT INTO `folders`(name,user_id ) VALUES (:folder_name,:user_id) ";
   $stmt=$pdo->prepare($sql);
   $stmt->execute(['folder_name'=>$folder_name,'user_id'=>$currend_use_id]);
   return $stmt->rowCount();
}

function DoneSwitch($task_id){
  global $pdo;
  $currend_user_id=getCurrendUseId();
   $sql="UPDATE `tasks` SET is_done =1 - is_done where user_id= :userid and id= :task_ID ";
   $stmt=$pdo->prepare($sql);
   $stmt->execute([':task_ID'=>$task_id,':userid' =>$currend_user_id]);
   return $stmt->rowCount();
}


//**task function** *//
function getTasks(){
  global $pdo;
  $currend_use_id=getCurrendUseId();
  $folder=$_GET['folder'] ?? null;
  $folderCondition='';
  if(isset($folder) and is_numeric($folder)){
    $folderCondition="and folder_id=$folder";
  }
   $sql="SELECT * from tasks where user_id=$currend_use_id $folderCondition ";
   $stmt=$pdo->prepare($sql);
   $stmt->execute();
   $recored=$stmt->fetchAll(PDO::FETCH_OBJ);
  return $recored;
  }
  
function AddTask($taskTitle,$folderId){
  global $pdo;
  $currend_use_id=getCurrendUseId();
   $sql="INSERT INTO `tasks`(title,user_id,folder_id ) VALUES (:title,:user_id,:folder_id) ";
   $stmt=$pdo->prepare($sql);
   $stmt->execute(['title'=>$taskTitle,'user_id'=>$currend_use_id,'folder_id'=>$folderId]);
   return $stmt->rowCount();
  }
  
function DeleteTasks($task_id){
  global $pdo;

   $sql="DELETE from tasks where id=$task_id";
   $stmt=$pdo->prepare($sql);
   $stmt->execute();
 
  return $stmt->rowCount();
}

  
