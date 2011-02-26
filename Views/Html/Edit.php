<?php
class EditPage extends BasePage{
  function __construct($request) {
    $articleId = intval($request["article"]);

    $this->article = ArticleModel::getInstance($articleId);
  }
  function echoHead()
  {
  ?>
    <link rel='stylesheet' type='text/css' href='Static/Css/edit.css'/>
    <style type='text/css'>#aside{display:none}</style>
  <?php
  }

  function echoContent() {
    global $config;
    echo "<form class='info-list' method='post' action='?article=".$this->article["id"]."'>";
    echo "<span class='dev-note'>Entrys marked with a * will be used if available; others arent as important</span>";
    echo "<span class='dev-note'>Should i put a password on the file; or is it hard enough finding the new site</span>";
    $this->textEntry("Title*", "title");
    $this->dropDown("Category*", "category_id", "CategoryModel", "title", "id");
    $this->dropDown("Section*", "section_id", "SectionModel", "title", "id");
    $this->dropDown("Location*", "location_id", "LocationModel", "name", "id");
    $this->textEntry("Summary*", "summary");
    $this->longEntry("Intro*", "intro");
    $this->longEntry("Rules", "rules");
    $this->image("Background*", "image_1", "/Background");
    $this->image("Thumbnail 1*", "image_2", "/Content/Thumbnails");
    $this->image("Thumbnail 2*", "image_3", "/Content/Thumbnails");
    $this->textEntry("Date(Finals)*", "date_final");
    $this->textEntry("Date(Elims)*", "date_elim");
    $this->textEntry("Entry Fee*", "entry_fee");

    $this->textEntry("1st Prize*", "prize_first");
    $this->textEntry("2nd Prize*", "prize_second");
    $this->textEntry("3rd Prize*", "prize_third");
    $this->textEntry("Prize-info*","prize_info");

    $this->textEntry("Max participants in a group*", "participants");
    $this->textEntry("Co-ordinator", "coordinator");
    $this->textEntry("Event Head", "event_head");
    $this->fixedEntry("Specification", "specification");
    $this->textEntry("Domain", "domain");
    echo "<div class='info-item'>";
      echo "<div class='info-label'></div>";
      echo "<input type='submit' name='save' value='Done'>";
    echo "<a href='?article=".$this->article["id"]."'>Cancel</a>";

    echo "</div>";    echo "</form>";

  }
  private function textEntry($label, $name) {
    $value = $this->article[$name];
    echo "<div class='info-item'>";
      echo "<div class='info-label'>$label</div>";
      echo "<input class='info-data' name='$name' value='$value' />";
    echo "</div>";
  }
  private function longEntry($label, $name) {
    $value = $this->article[$name];
    echo "<div class='info-item'>";
      echo "<div class='info-label'>$label</div>";
      echo "<textarea class='info-data' name='$name'>$value</textarea>";
    echo "</div>";
  }
  private function fixedEntry($label, $name){
    $value = $this->article[$name];
    echo "<div class='info-item'>";
      echo "<div class='info-label'>$label</div>";
      echo "<div class='info-data' >$value</div>";
      echo "<input type='hidden' name='$name' value='$value' />";
    echo "</div>";
  }
  function dropDown($label, $name, $model, $displayCol, $idCol){
    $value = $this->article[$name];
//     $opts = $model::getList(); // PHP < 5.3.
    $opts = call_user_func(array($model, "getList"));
    echo "<div class='info-item'>";
      echo "<div class='info-label'>$label</div>";
      echo "<select name='$name'>";
      while($opt = $opts->getAssoc()){
	$selected = ($opt[$idCol]==$value)?"selected='selected'":"";
	echo "<option $selected value='".$opt[$idCol]."'>".$opt[$displayCol]."</option>";
      }
      echo "</select>";
    echo "</div>";
  }
  function image($label, $name, $base){
    $value = $this->article[$name];

    $dir  = dir("Static/Images/$base");
    echo "<div class='info-item'>";
      echo "<div class='info-label'>$label</div>";
      echo "<select name='$name'>";
//       Put default value
      $selected = ($entry=="")?"selected='selected'":"";
      echo "<option $selected value=''>".$entry."</option>";
// 	 The images in a folder
      while($entry = $dir->read()){
	$selected = ($entry==$value)?"selected='selected'":"";
	echo "<option $selected value='".$entry."'>".$entry."</option>";
      }
      echo "</select>";
    echo "</div>";
  }
  function echoAside(){
  }

}

