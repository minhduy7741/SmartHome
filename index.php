<?php 
const _STATUS = 1;
include "config.php";
include "includes/database.php";
include "includes/functions.php";
include "includes/phpmailer/Exception.php";
include "includes/phpmailer/PHPMailer.php";
include "includes/phpmailer/SMTP.php";

$modules = 'home';
$action = 'home';

if(!empty($_GET['modules'])){
        $modules = $_GET['modules'];
}
if(!empty($_GET['action'])){
    $action = $_GET['action'];
}

$path = _WEBDIR."/modules/$modules/$action.php";

if(file_exists($path)){
    try {
        include $path;
    } catch (Exception $e) {
        include "404.php";
    }
} 
?>