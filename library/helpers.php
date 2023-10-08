<?php
defined('BASE_PATH') OR die('permision denied');

function getCurrentUrl(){
    return 1;
}
function diePage($msg){
    echo "<div> $msg</div>";
    die();
}
function site_url($uri=""){
    return BASE_URL. $uri;
}
function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }
    return false;
}

function dd($var){
    echo "<pre style= 'color: red; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px solid blue; border-left: 3px solid brown;'>";
    var_dump($var);
    echo "</pre>";
}