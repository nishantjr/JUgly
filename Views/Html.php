<?php
class HtmlView{
  private $page;
  public static function echoCacheUrl($url) {
    if(!file_exists($url)){
      echo "$url?nope";
      return "No-file-found";
    }
    $mtime = filemtime($url);
    echo "$url?ver=$mtime";
  }
  function __construct($request)
  {
    if(isset($request["edit"])) {
      global $_SESSION, $config;
     if(!isset($_SESSION["password"]) or $_SESSION["password"]!==$config["password"]) {
	echo "What's the password??
	      <form method='post'>
		<input type='password' name='password'/>
		<input type='submit'>
	      </form>";
	die();
      }
      $page = "EditPage";
    }
    else if(isset($request["article"]))
      $page = "ArticlePage";
    else if(isset($request["rules"]))
      $page = "RulesPage";
    else if(isset($request["credits"]))
      $page = "CreditsPage";
    else if(isset($request["directions"]))
      $page = "DirectionsPage";
    else $page = "HomePage";

    $this->page = new $page($request);
  }
  function put() {
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8" />
    <link rel='stylesheet' type='text/css' href='<?php HtmlView::echoCacheUrl("Static/Css/layout.php") ?>'/>
    <link rel='stylesheet' type='text/css' href='<?php HtmlView::echoCacheUrl("Static/Css/style.php") ?>'/>
    <link rel='stylesheet' type='text/css' href='<?php HtmlView::echoCacheUrl("Static/Fonts/stylesheet.css") ?>'/>
    <link rel="shortcut icon" href="Static/Images/Site/favicon_shadow.ico" />

    <?php $this->page->echoHead();?>
    <title><?php $this->page->echoTitle();?></title>
  </head>
  <body>
      <div id='header' style='background-image: url("<?php HtmlView::echoCacheUrl("Static/Images/Site/Banner-Repeat.png") ?>")'>
	<a href='?'><img src='<?php HtmlView::echoCacheUrl("Static/Images/Site/Logo.png") ?>"' /></a>
      </div>

      <div id='content' >
	<div id='centerbox' <?php $this->page->echoContentAttr();?> ><?php $this->page->echoContent();?></div>
      </div>
      <div id='aside'>
	<?php $this->page->echoAside();?>
	<ul id='pagenav'>
	  <li><a href='?home'>Home</a></li>
	  <li><a href='?credits'>Thanks to...</a></li>
	  <li><a href='?directions'>Getting Here</a></li>
	</ul>
      </div>


    </body>
</html>

<?php
  }
}

