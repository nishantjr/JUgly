<?php
class HtmlView{
  private $page;
  function __construct($request)
  {
    if(isset($request["edit"]))
      $page = "EditPage";
    else if(isset($request["article"]))
      $page = "ArticlePage";
    else if(isset($request["jarticle"]))
      $page = "JoomlaArticlePage";
    else if(isset($request["jhome"]))
      $page = "JoomlaHomePage";
    else $page = "HomePage";

    $this->page = new $page($request);
  }
  function put() {
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8" />
    <link rel='stylesheet' type='text/css' href='Static/Css/layout.php'/>
    <link rel='stylesheet' type='text/css' href='Static/Css/content.php'/>
    <?php $this->page->echoHead();?>
    <title><?php $this->page->echoTitle();?> - Transmission</title>
  </head>
  <body>
    <div id='main'>
      <div id='header'>
<!-- 	<img src='/Static/Images/Header-Small.jpg'/> -->
<h1 id='fakelogo'>TRANSMISSION</h1>
      </div>
      <div id='content' class='pane' <?php $this->page->echoContentAttr();?>>

<?php $this->page->echoContent();?>
      </div>
      <div id='aside' class='pane'>
<?php $this->page->echoAside();?>
</div>
    </div>

    </body>
</html>

<?php
  }
}

