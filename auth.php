<?php
include 'bootstrap/init.php'; 
   $home_url=site_url();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $action=$_GET['action'];
        $params=$_POST;

    if($action== 'register'){

        $result= register($params);
        if(!$result){
        ErrorMessage("Error: an error in registration");
        }else{
            ErrorMessage("Registration is successfull => welcome .<br>
             <a href='{$home_url}auth.php'>Please Loggin</a>
            ");
        }

    }elseif($action== 'login'){

        $result= login($params['email'],$params['password']);
        if(!$result){
            ErrorMessage("Error: Email or password is incurect");
            }else{
                // ErrorMessage("You are logged in now .<br>
                //  <a href='{$home_url}'>Manage your tasks</a>
                // ");
                Redirect(site_url());
            }
    }
}

include 'themplate/tpl-auth.php';