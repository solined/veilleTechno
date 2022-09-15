<?php
session_start();
require '../app/Autoloader.php';
App\Autoloader::register();
    
var_dump(App\App::getTable('Posts'));
var_dump(App\App::getTable('Users'));
var_dump(App\App::getTable('Categories'));
var_dump(App\App::getTable('categories'));
