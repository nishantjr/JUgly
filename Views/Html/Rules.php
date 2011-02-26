<?php
class RulesPage extends BasePage{
  function __construct($request) {
    $articleId = intval($request["rules"]);
    $this->article = ArticleModel::getInstance($articleId);
  }

  function echoTitle()  {
    echo $this->article["title"]." Rules";
  }
  function echoContentAttr(){
    ?>style='background-image: url("<?php 
				      HtmlView::echoCacheUrl("Static/Images/Background/".$this->article["image_1"]) 
				    ?>");
	     background-repeat: no-repeat;
	     background-position: right top;'<?php
  }

  function echoContent(){
    echo "<div id='rules'>";
    echo $this->article["rules"];
    echo "</div>";
  }

  function echoHead() {
    echo "<link rel='stylesheet' type='text/css' href='";
    HtmlView::echoCacheUrl("Static/Css/credits_rules.php");
    echo "'/>";
  }
}