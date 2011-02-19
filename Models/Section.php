<?php
class SectionModel extends BaseModel{
  static $database;

  static function getInstance($id){
    $id = intval($id);
    $sql = "SELECT  sec.*
	    FROM sections AS sec 
	    WHERE cat.id=$id
	    ORDER BY sec.id";
//     echo "<pre>$sql</pre>";
    $result = BaseModel::$database->query($sql);
//     $result = $result->next();
    return $result->fetch_assoc();
  }
  static function getList($params=null) {
    $sql = "SELECT  sec.*
	    FROM sections AS sec 
	    ORDER BY sec.id";
    $result = BaseModel::$database->query($sql);
    return new SectionModelList($result);
  }
} 

class SectionModelList {
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

 
