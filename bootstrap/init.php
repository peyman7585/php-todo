<?php

include 'constants.php';
include 'config.php';
include 'vendor/autoload.php';
include 'library/helpers.php';
try{
   $pdo=new PDO("mysql:dbname=$database_config->db;host={$database_config->host}",$database_config->user,$database_config->pass);
}catch(PDOException $e){
    diePage('Connection failed: '.$e->getMessage());

}

include 'library/lib-auth.php';
include 'library/lib-tasks.php';
