<?php
class ArticlePage extends BasePage{
  function __construct($request) {
    $articleId = intval($request["article"]);
    $this->article = ArticleModel::getInstance($articleId);
  }

  function echoTitle()
  {echo $this->article["title"];}
  function echoContentAttr(){
    ?>style='background: url("Static/Images/Backgrounds/<?php echo $this->article["image_1"]; ?>") no-repeat; background-position: left center'<?php
  }
  private function echoInfo($label, $name){
  ?>
    <div class='info-item'>
      <div class='info-label'><?php echo $label ?></div>
      <div class='info-data'><?php echo $this->article[$name] ?></div>
    </div>
  <?php
  }
  function echoContent(){
  ?>
    <div class='images'>
      <?php 
	if($this->article["image_2"]!="")
	  echo "<img src='Static/Images/".$this->article["image_2"]."' id='image2' />";
	if($this->article["image_3"]!="")
	  echo "<img src='Static/Images/".$this->article["image_3"]."' id='image3' />";
      ?>
    </div>
    <div class='article' >
      <div class='box text'>
	<div class='article-title'>
	  <?php echo $this->article["title"]; echo "<a href='?article=".$this->article["id"]."&edit'>Edit</a>";?>
	</div>
	<div class='article-section article-summary'>
	  <?php echo nl2br($this->article["summary"]); ?>
	</div>
	<div class='article-section article-intro'>
	  <?php echo nl2br($this->article["intro"]); ?>
	</div>
      </div>
      <div class='info-list box'>
	<?php $this->echoInfo("When", "date"); ?>
	<?php // $this->echoInfo("Where", "venue"); ?>
      </div>
    </div>

  <?php
  }
}