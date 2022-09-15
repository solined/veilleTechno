<?php
namespace App;

class App{
  public static function getTable($name){
    $class_name = '\AppTable\\' . ucfirst($name) . 'Table';
    return new $class_name();
  }
}
