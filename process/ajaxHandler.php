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
      echo  AddFolders($_POST['folderName']); 
        break;
    case "addTask":
        // var_dump($_POST);
        break;
        
    default;    
}
