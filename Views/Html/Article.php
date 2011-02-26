<?php
class ArticlePage extends BasePage{
  function __construct($request) {
    $articleId = intval($request["article"]);
    $this->article = ArticleModel::getInstance($articleId);
  }

  function echoTitle()  {
    echo $this->article["title"];
  }
  function echoContentAttr(){
    ?>style='background-image: url("<?php 
				      HtmlView::echoCacheUrl("Static/Images/Background/".$this->article["image_1"]) 
				    ?>");
	     background-repeat: no-repeat;
	     background-position: 65% top;'<?php
  }
  private function echoInfo($label, $name){
    if($this->article[$name]=="") return;
  ?>
    <div class='info-item'>
      <div class='info-label'><?php echo $label ?></div>
      <div class='info-data'><?php echo preg_replace("/Rs\W/", "&#x20B9; ", $this->article[$name]) ?></div>
    </div>
  <?php
  }
  function echoContent(){
  ?>
    <div id='images'>
      <?php $this->echoImages() ?>
    </div>
    <div id='article' >
      <?php $this->echoArticle() ?>
    </div>
  <?php
  }
  protected function echoImages(){
    if($this->article["image_2"]!=""){
      echo "<img src='";
      HtmlView::echoCacheUrl("Static/Images/Content/Thumbnails/".$this->article["image_2"]);
      echo "' id='image2' />";
    }
    if($this->article["image_3"]!=""){
      echo "<img src='";
      HtmlView::echoCacheUrl("Static/Images/Content/Thumbnails/".$this->article["image_3"]);
      echo "' id='image3' />";
    }
  }
  protected function echoArticle(){
    ?>
      <div class='box text'>
	<h1 class='article-title'>
	  <?php echo $this->article["title"]; /*echo "<a href='?article=".$this->article["id"]."&amp;edit'>Edit</a>";*/?>
	</h1>
	<div class='article-summary'>
	  <?php echo nl2br($this->article["summary"]); ?>
	</div>
	<div class='article-intro'>
	  <?php echo nl2br($this->article["intro"]); ?>
	</div>
      </div>
      <div class='info-box'>
	<div class='info-title'>Time &amp; Place</div>
	
	<?php 
	    if($this->article["date_elim"]!="")
	    {
	      $this->echoInfo("Elims", "date_elim");
	      $this->echoInfo("Finals", "date_final");
	    }
	    else
	      $this->echoInfo("When", "date_final"); 
	    $this->echoInfo("Where", "location");

	?>

      </div>
      <?php 
	  if($this->article["prize_first"]!="")
	  {
	  ?>
	  <div class='info-box'>
	    <div class='info-title'>Prizes</div>
	    <?php $this->echoInfo("First", "prize_first"); ?>
	    <?php $this->echoInfo("Second", "prize_second"); ?>
	    <?php $this->echoInfo("Third", "prize_third"); ?>
	    <?php $this->echoInfo("Also", "prize_info"); ?>
	  </div>
	  <?php 
	  }

	  if($this->article["event_head"]!=""
	  or $this->article["coordinator"]!="")
	  {
	    ?>
	    <div class='info-box'>
	      <div class='info-title'>Contact</div>
	      <?php $this->echoInfo("Event Head", "event_head"); ?>
	      <?php $this->echoInfo("Coordinator", "coordinator"); ?>
	    </div>
	    <?php 
	  }
	  if($this->article["entry_fee"]!=""
	  or $this->article["rules"]!=""
	  or $this->article["participants"]!="")
	  {
	    ?>
	    <div class='info-box'>
	      <div class='info-title'>Details</div>
	      <?php $this->echoInfo("Entry Fee", "entry_fee"); ?>
	      <?php $this->echoInfo("Participants", "participants"); ?>
	      <?php if($this->article["rules"]!="") echo "<a class='info-data' href='?rules=".$this->article["id"]."'>Rules</a>"; ?>
	    </div>
	    <?php 
	  }

  }
}