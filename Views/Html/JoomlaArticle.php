<?php
class JoomlaArticlePage extends BasePage{
  function __construct($request) {
    $articleId = intval($request["jarticle"]);
    $this->article = JoomlaArticleModel::getInstance($articleId);
  }
  function echoHead()
  {
  ?>   
  <?php
  }
  function echoContent(){
  ?>
    <div class='article'>
      <div class='article-title'>
	<?php echo $this->article["title"]; ?>
      </div>
      <?php echo $this->article["introtext"]; ?>
    </div> 
  <?php
  }
  function echoAside(){

  }
} 
