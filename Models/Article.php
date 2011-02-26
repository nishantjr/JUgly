<?php

class ArticleModel extends BaseModel{
  static $database;

  static function getInstance($id){
    $id = intval($id);
    $sql = "SELECT art.*,
		    cat.id AS cat_id, cat.title AS cat_title,
		    sec.id AS sec_id, sec.title AS sec_title,
		    loc.id AS loc_id, loc.name as location
	    FROM articles AS art
	    JOIN categories AS cat ON art.category_id=cat.id 
	    JOIN sections AS sec ON sec.id=art.section_id
	    JOIN locations AS loc ON loc.id=art.location_id
	    WHERE art.id=$id
	    ORDER BY cat.title, sec.id";
//     echo "<pre>$sql</pre>";
    $result = BaseModel::$database->query($sql);
//     $result = $result->next();
    return $result->fetch_assoc();
  }
  static function getList($params=null) {
// 	    JOIN locations AS loc ON art.location_id=loc.id 
// 	    loc.id as loc_id, loc.name as loc_name, loc.floor as loc_floor,
    $sql = "SELECT art.*,
		    cat.id AS cat_id, cat.title AS cat_title,
		    sec.id AS sec_id, sec.title AS sec_title,
		    loc.id AS loc_id, loc.name as location
	    FROM articles AS art
	    JOIN categories AS cat ON art.category_id=cat.id 
	    JOIN sections AS sec ON sec.id=art.section_id
	    JOIN locations AS loc ON loc.id=art.location_id
	    ORDER BY cat.title DESC, sec.id";
    $result = BaseModel::$database->query($sql);
    return new ArticleModelList($result);
  }

/*HACK ZONE*/
  static private $request;
  static private $set;
  static function save($request){
/*HACK ZONE*/
    self::$request = $request;
    self::textEntry("Title", "title");
    self::dropDown("Category", "category_id", "CategoryModel", "title", "id");
    self::dropDown("Section", "section_id", "SectionModel", "title", "id");
    self::dropDown("Location", "location_id", "LocationModel", "name", "id");
    self::textEntry("Summary", "summary");
    self::longEntry("Intro", "intro");
    self::longEntry("Rules", "rules");
    self::longEntry("Specification", "specification");
    self::textEntry("Domain", "domain");
    self::textEntry("Entry Fee", "entry_fee");
    self::textEntry("Max participants in a group", "participants");
    self::textEntry("1st Prize", "prize_first");
    self::textEntry("2nd Prize", "prize_second");
    self::textEntry("3rd Prize", "prize_third");
    self::textEntry("Prize Info", "prize_info");
    self::textEntry("Co-ordinator", "coordinator");
    self::textEntry("Event Head", "event_head");
    self::textEntry("Date", "date_elim");
    self::textEntry("Date", "date_final");
    self::textEntry("Image 1", "image_1");
    self::textEntry("Image 2", "image_2");
    self::textEntry("Image 3", "image_3");

    $set = join(", ", self::$set);
    $sql = "UPDATE articles SET $set WHERE id='".$request["article"]."'";
    $result = BaseModel::$database->query($sql);
    return;
  }/*HACK ZONE*/

  private static function entry($name){
    self::$set[] = $name."='".BaseModel::$database->real_escape_string(self::$request[$name])."'";
  }
  private static function textEntry($label, $name) {
    self::entry($name);
  }
  private static function longEntry($label, $name) {
    self::entry($name);
  }
  private static function fixedEntry($label, $name){
    self::entry($name);
  }
  private static function dropDown($label, $name, $model, $displayCol, $idCol){
    self::entry($name);
  }
} 

class ArticleModelList {
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