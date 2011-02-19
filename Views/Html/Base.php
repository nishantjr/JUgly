<?php
class BasePage {
  function __construct($request) {}
  function echoContentAttr(){}
  function echoContent(){}

  function echoAside(){
    $items = ArticleModel::getList();
    $old_sec=null;
    $old_cat=null;
    echo "\n<ul class='homenav'>\n";
    while($item = $items->getAssoc()) 
    { 
      if($item["cat_title"] != $old_cat)
      {
	//A new section, make a new header
	if($old_cat!=null) echo "\n\t\t</ul></li>"; //Close the old cat
	if($old_sec!=null) echo "\n\t</ul></li>"; //Close the old section
 	echo "\n\t<li>";
	echo "\n\t\t<a href='#'>".$item["cat_title"]."</a>";
	echo "\n\t\t<ul class='homenav-category ".$item["cat_title"]."'>";
	$old_cat=$item["cat_title"];
	$old_sec=null;
      }

      if($item["sec_id"] != $old_sec)
      {
	//A new section, make a new header
	if($old_sec!=null) echo "\n\t\t</ul></li>"; //Close the old section
 	echo "\n\t\t<li>";
	echo "\n\t\t\t<a href='#'>".$item["sec_title"]."</a>";
 	echo "\n\t\t\t<ul class='homenav-section ".$item["sec_title"]."'>";
	$old_sec=$item["sec_id"];
      }

      echo "\n\t\t\t\t<li><a class='homenav-item' href='?article=".$item["id"]."' >";
      echo $item["title"];
      echo "</a></li>";
    }
    echo "</ul></ul>\n</ul>";
  }  function echoTitle(){}
  function echoHead()
  {
  ?>
    <link rel='stylesheet' type='text/css' href='Static/Css/menu.php'/>
  <?php
  }
} 
