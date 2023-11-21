<?php
include 'bootstrap/init.php'; 

if(isset($_GET['logout'])){
  logout();
}
if(!isLoggedIn()){

  Redirect(site_url('auth.php'));
}
$user=GetLoggedInUser();
use Hekmatinasser\Verta\Verta;
if(isset($_GET['DeleteFolder']) && is_numeric($_GET['DeleteFolder'])){
  $deleteCount= DeleteFolder($_GET['DeleteFolder']);
//   echo "$deleteCount folders succefully deleted";
}
if(isset($_GET['DeleteTask']) && is_numeric($_GET['DeleteTask'])){
  $deleteCount= DeleteTasks($_GET['DeleteTask']);
//   echo "$deleteCount tasks succefully deleted";
}

$folders=getFolders();
$tasks=getTasks();

include 'themplate/tpl-index.php';