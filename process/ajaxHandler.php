<?php
include_once "../bootstrap/init.php";

if(!isAjaxRequest()){
    diePage("invalid request..");
}

if(!isset($_POST['action']) || empty($_POST['action'])){
    diePage('invalid action ..');
}

switch($_POST['action']){
    case "addfolder":
    if(!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3){
        echo "you should use more than 3 word for your name folder";
        die();
    }
       echo  AddFolder($_POST['folderName']); 

        break;
    case "addTask":
        $folderID=$_POST['folderId'];
        $taskTitle=$_POST['taskTitle'];
        if(!isset($folderID) || empty($folderID)) {
            echo "select the folder";
            die();
        }
        if(!isset($taskTitle) || strlen($taskTitle) <3) {
            echo "you should use more than 3 word for your name tasks";
            die();
        }
      echo addTask($taskTitle,$folderID);
        break; 
        
    default;    
}
