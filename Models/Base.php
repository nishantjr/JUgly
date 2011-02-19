<?php
include("config.php");

abstract class BaseModel {
//How to initialize static-protected?   
  /*protected*/ static $database;
/*
  pseudo-static (implemented by each subclass as static)
  abstract function __construct($id); //Return a single model
  abstract function getList($params); //Return list based on some arbitary params
*/
} 
abstract class BaseModelList {
  abstract function __construct($params);
  abstract function getAssoc();
  abstract function getCount();
  //abstract function reset();
}

BaseModel::$database = new mysqli($config["database_host"], $config["database_user"], $config["database_password"], $config["database_name"]);  
