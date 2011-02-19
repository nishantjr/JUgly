<?php
include("config.php");

class JoomlaArticleModel {
  static $database;

  static function getInstance($id){
    $id = intval($id);
    $sql = "SELECT con.*,
		    cat.id AS cat_id, cat.title AS cat_title,
		    sec.id AS sec_id, sec.title AS sec_title 
	    FROM jos_content AS con 
	    JOIN jos_categories AS cat ON con.catid=cat.id 
	    JOIN jos_sections AS sec ON sec.id=cat.section
	    WHERE con.id=$id
	    ORDER BY sec.id, cat.id";
//     echo "<pre>$sql</pre>";
    $result = self::$database->query($sql);
//     $result = $result->next();
    return $result->fetch_assoc();
  }
  static function getList($params=null) {
    $sql = "SELECT con.title, con.id,
		    cat.id AS cat_id, cat.title AS cat_title,
		    sec.id AS sec_id, sec.title AS sec_title 
	    FROM jos_content AS con 
	    JOIN jos_categories AS cat ON con.catid=cat.id 
	    JOIN jos_sections AS sec ON sec.id=cat.section
	    ORDER BY cat.title DESC, sec.id";
    $result = self::$database->query($sql);
    return new JoomlaArticleModelList($result);
  }
} 

class JoomlaArticleModelList {
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

JoomlaArticleModel::$database = new mysqli($config["database_host"], $config["database_user"], $config["database_password"], $config["database_joomla"]); 