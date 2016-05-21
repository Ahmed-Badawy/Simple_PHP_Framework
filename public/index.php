<?php namespace simple_mvc;

// add the composer autoloader
require_once '../vendor/autoload.php';


require_once '../app/config/conf.php';
//add the db configration to run eloquent
require_once '../app/config/database.php';


$app = new App;
$controller = new Controller;
