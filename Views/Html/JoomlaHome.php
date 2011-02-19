<?php
class JoomlaHomePage extends BasePage{
  function echoHead()
  {
  ?>
    <link rel='stylesheet' type='text/css' href='Static/homepage.css'/>
  <?php
  }
  function echoContent(){
  ?>
    This is the raw joomla content unconverted  
    <br><strong><a href='?home'>Refined content :)</a></strong><?php
  }
  function echoAside(){
    $items = JoomlaArticleModel::getList();
    $old_sec=null;
    $old_cat=null;
    echo "<ul class='homenav'>";
    while($item = $items->getAssoc()) 
    { 
      if($item["cat_title"] != $old_cat)
      {
	//A new section, make a new header
	if($old_cat!=null) echo "</ul></li>"; //Close the old cat
	if($old_sec!=null) echo "</ul></li>"; //Close the old section
 	echo "<li>";
	echo "<a href='#'>".$item["cat_title"]."</a>";
	echo "<ul class='homenav-category'>";
	$old_cat=$item["cat_title"];
	$old_sec=null;
      }

      if($item["sec_id"] != $old_sec)
      {
	//A new section, make a new header
	if($old_sec!=null) echo "</ul></li>"; //Close the old section
 	echo "<li>";
	echo "<a href='#'>".$item["sec_title"]."</a>";
 	echo "<ul class='homenav-section'>";
	$old_sec=$item["sec_id"];
      }

      echo "<li><a class='homenav-item' href='?jarticle=".$item["id"]."' >";
      echo $item["title"];
      echo "</a></li>";
    }
    echo "</ul>";
  }
}