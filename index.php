<?php
include 'bootstrap/init.php'; 
use Hekmatinasser\Verta\Verta;
if(isset($_GET['DeleteFolder']) && is_numeric($_GET['DeleteFolder'])){
  $deleteCount= DeleteFolder($_GET['DeleteFolder']);
//   echo "$deleteCount folders succefully deleted";
}

$folders=getFolders();
$tasks=getTasks();
include 'themplate/tpl-index.php';