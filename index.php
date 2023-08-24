<?php
include 'bootstrap/init.php'; 
use Hekmatinasser\Verta\Verta;
$verta=new Verta();
echo $verta::now();
include 'themplate/tpl-index.php';