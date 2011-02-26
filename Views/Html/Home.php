<?php
class HomePage extends ArticlePage{
  function __construct($request) {
  }
  function echoContentAttr(){
    ?>style='background-image: url("Static/Images/Background/XIE.png");
	     background-repeat: no-repeat;
	     background-position: 80% center;'<?php
  }

  function echoHead(){
    ?>
    <style type='text/css'>
      .sponsors{
	vertical-align: middle;
	display: inline-block;
	padding: 0 0.3em;
      }
      .article-intro{
	font-size: 0.9em;
      }
    </style>
    <?php
  }

  function echoTitle(){
    echo "Transmission 2011";
  }

  function echoArticle(){
  ?><div class='article-intro'>
      The Students of Xavier Institute of Engineering bring you Transmission 2011.<br/>
      With events across the spectrum, <a title='Bluetooth Treauser Hunt' href='?article=15'>a bluetooth treasure hunt</a>, 
      robotic contests (<a  title='Survivor Series' href='?article=23'>head to head battles</a>, <a title='FIFA Bots' href='?article=26'>football</a>,
      strategic games that will test your ingenuity),
      the traditional CS clan games, this years techfest promises to be as entertaining as ever to all who attend. 
      <br>
      So join us between the 1st and 3rd of March for a fun time.

    </div>
    <div id='sponsors'>
      <?php include("Views/Html/_sponsors.php"); ?>
    </div>
  <?php
  }

  function echoImages(){
    $flowplayer = "http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf";
    $ogv = "Static/Images/Video/Video.ogv";
    $mp4 = "Static/Images/Video/Video.mp4";
    $host = $_SERVER["HTTP_HOST"];
    $size = "width='350' height=240";
  ?>
    <video id="movie" <?php echo $size; ?> preload controls class='img'>
      <source src="<?php echo $ogv ?>" type='video/ogg; codecs="theora, vorbis"' />
      <source src="<?php echo $mp4 ?>" />
      <object type="application/x-shockwave-flash" <?php echo $size; ?>
	data="<?php echo $flowplayer ?>"> 
	<param name="movie" value="<?php echo $flowplayer ?>" /> 
	<param name="allowfullscreen" value="true" /> 
	<param name="flashvars" value='config={"clip": {"url": "<?php echo "http://$host/$mp4" ?>", "autoPlay":false, "autoBuffering":true}}' /> 
<!-- 	<p>Download video as <a href="/Static/Images/Video/Video.mp4">MP4</a>, <a href="pr6.webm">WebM</a>, or <a href="pr6.ogv">Ogg</a>.</p>  -->
      </object>
    </video>
  <?php
  }

  private function echoSponsor($title, $file, $name, $link=false){
    $this->echoSponsorNT($title, $file, $name, $link);
  }

  private function echoSponsorNT($title, $file, $name, $link=false){
    echo "<div class='sponsors'>";
    $href="";
    if($link)
      $href = "href='$link'";
    echo    " <a $href><img alt='$name' title='$name' src='Static/Images/Sponsors/Small/$file'/></a>";
    echo "</div>";
  }
}