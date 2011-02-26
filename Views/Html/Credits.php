<?php
class CreditsPage extends BasePage{
  function __construct($request) {
  }
  function echoTitle()
  {
    echo "Thanks to";
  }
  function echoContent(){
    echo "<div id='sponsors'>";
    echo "<div class='sponsors-title article-title'>";
    echo "Sponsors";
    echo "</div>";
    echo "<div class='sponsors-summary article-summary'>";
    echo "The nice folks who made Transmission 2011 possible";
    echo "</div>";
    include("Views/Html/_sponsors.php");
    echo "</div>";
  }
  private function echoSponsor($title, $file, $name, $link=false){
    $href="";
    if($link)
      $href = "href='$link'";
    echo "<div class='sponsor'>
	    <a $href><img alt='$name' title='$name' src='Static/Images/Sponsors/Big/$file'/></a>
	    <div class='sponsor-name'>$name</div>
	    <div class='sponsor-title'>$title</div>
	  </div>";
  }
  private function echoSponsorNT($title, $file, $name, $link=false){
    echo "<div class='sponsor'>";
    $href="";
    if($link)
      $href = "href='$link'";
    echo    " <a $href><img alt='$name' title='$name' src='Static/Images/Sponsors/Big/$file'/></a>";
    echo "<div class='sponsor-title'>$title</div>";

    echo "</div>";
  }
  function echoHead() {
    echo "<link rel='stylesheet' type='text/css' href='";
    HtmlView::echoCacheUrl("Static/Css/credits_rules.php");
    echo "'/>";
  }

}