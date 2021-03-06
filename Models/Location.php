<?php
class LocationModel extends BaseModel{
  static $database;

  static function getInstance($id){
    $id = intval($id);
    $sql = "SELECT  cat.*
	    FROM locations AS cat 
	    WHERE cat.id=$id
	    ORDER BY cat.id";
//     echo "<pre>$sql</pre>";
    $result = BaseModel::$database->query($sql);
//     $result = $result->next();
    return $result->fetch_assoc();
  }
  static function getList($params=null) {
    $sql = "SELECT  cat.*
	    FROM locations AS cat 
	    ORDER BY cat.id";
    $result = BaseModel::$database->query($sql);
    return new LocationModelList($result);
  }
} 

class LocationModelList {
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

 
