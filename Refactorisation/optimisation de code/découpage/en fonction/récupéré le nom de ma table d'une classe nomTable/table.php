<?php
namesapce App\Table;

class Table{
  protected $table;
  
  public function __construct(){
    $parts = explode('\\', get_class ($this));
    $class_name = end($parts);
    $this->table = strtolower(str_replace('Table', '', $class_name));
  }
}
