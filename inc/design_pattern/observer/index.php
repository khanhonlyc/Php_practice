<?php
// spl_autoload_register(function($class_name){
//     $class_name = str_replace('\\', '/', $class_name);
//     require_once $class_name . ".php";
// });

require_once 'Auth.php';
require_once 'ForumAuthObserver.php';
require_once 'LoggerObserver.php';

$auth = new Auth();
$forumAuth = new ForumAuthObserver();
$logger = new LoggerObserver();

$auth->attach($forumAuth);
$auth->attach($logger);
$auth->login();
$auth->logout();
print_r($auth);

echo "<br /> <br />";
$auth->detach($forumAuth);
$auth->login();
$auth->logout();
print_r($auth);