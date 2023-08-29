<?php
defined('BASE_PATH') OR die('permision denied');

function getCurrentUrl(){
    return 1;
}
function diePage($msg){
    echo "<div> $msg</div>";
    die();
}
function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }
    return false;
}