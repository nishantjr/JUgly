<?php
include("config.php");

class JoomlaSectionModel {
  static $database;

  static function getInstance($id){
    $id = intval($id);
    $sql = "SELECT *
	    FROM jos_sections 
	    WHERE id=$id";
//     echo "<pre>$sql</pre>";
    $result = self::$database->query($sql);
    return $result->fetch_assoc();
  }
  static function getList($params=null) {
    
    $sql = "SELECT *
	    FROM jos_sections";
    $result = self::$database->query($sql);
    return new JoomlaSectionModelList($result);
  }
}

class JoomlaSectionModelList {
  private $result;
  function __construct($result){
    $this->result = $result;
  }
  function getAssoc(){
    return $this->result->fetch_assoc();
  }
  function getCount(){
    return $this->result->num_rows;
  }
  //abstract function reset();
}

JoomlaSectionModel::$database = new mysqli($config["database_host"], $config["database_user"], $config["database_password"], $config["database_joomla_name"]); 
