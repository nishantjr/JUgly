<?php
class BasePage {
  function __construct($request) {}
  function echoContentAttr(){}
  function echoContent(){}

  function echoAside(){
    $items = ArticleModel::getList();
    $old_sec=null;
    $old_cat=null;
    echo "\n<ul id='eventlist'>\n";
    while($item = $items->getAssoc()) 
    { 
      if($item["cat_title"] != $old_cat)
      {
	//A new section, make a new header
	if($old_cat!=null) echo "\n\t\t</ul></li>"; //Close the old cat
	if($old_sec!=null) echo "\n\t</ul></li>"; //Close the old section
 	echo "\n\t<li  class='eventlist-category'>";
	echo "\n\t\t<div class='eventlist-category-title'>".$item["cat_title"]."</div>";
	echo "\n\t\t<ul>";
	$old_cat=$item["cat_title"];
	$old_sec=null;
      }

      if($item["sec_id"] != $old_sec)
      {
	//A new section, make a new header
	if($old_sec!=null) echo "\n\t\t</ul></li>"; //Close the old section
 	echo "\n\t\t<li  class='eventlist-section'>";
	echo "\n\t\t\t<div class='eventlist-section-title'>".$item["sec_title"]."</div>";
 	echo "\n\t\t\t<ul>";
	$old_sec=$item["sec_id"];
      }

      echo "\n\t\t\t\t<li class='eventlist-item'><a  href='?article=".$item["id"]."' >";
      echo $item["title"];
      echo "</a></li>";
    }
    echo "</ul></ul>\n</ul>";

  }  function echoTitle(){}
  function echoHead()
  {  }
} 
