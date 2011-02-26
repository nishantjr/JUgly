<?php include("css_libs.php"); ?>
/*<style>*/
/* Menu */
a img{/*Firefox puts borders around img links urrrgg*/
  border: none;
}
#eventlist a{
  color: #666;
  text-decoration: none;
}
#eventlist a:hover{
  text-decoration: underline;
}
#eventlist a:visited{color: #444;}
.eventlist-section-title, 
.eventlist-category-title,
.eventlist-item {
  font-size: 0.8em;
}
.eventlist-section-title, 
.eventlist-category-title
{
  <?php serif(); ?>
  text-align: center;
  text-transform: uppercase;
}
.eventlist-section-title{
  border-bottom: 1px solid #ddd;
  color: #161;
  font-size: 0.7em;
}
.eventlist-category-title{
  border-bottom: 1px solid #aaa;
  color: #161;
  <?php serif_bold(); ?>
}
.eventlist-item{
  <?php sans(); ?>
  padding-bottom: 0.2em;
}

/* Article */
.article-title {
  border-bottom: 1px solid #bbb;
  font-weight: normal;
  <?php sans(); ?>
  font-size: 1.5em;
}
.article-summary {
  <?php serif(); ?>
  font-size: 0.8em;
  <?php serif_italic(); ?>
  color: #555;
  padding-bottom: 1em;
}
.article-intro {
  padding-bottom: 1.2em;
  font-size: 0.8em;
  <?php sans(); ?>
}
/* Labels */
.info-title{
  color: #444;
  text-transform: uppercase;
  text-align: center;
  font-size: 0.7em;
  border-bottom: 1px solid #ddd;
  <?php serif_bold(); ?>
}
.info-label:after{
  content: ": ";
}
.info-label{
  color: #777;
  font-size: 0.7em;
  text-transform: uppercase;
  <?php serif(); ?>
}
.info-data{
  font-size: 0.8em;
  <?php sans(); ?>
}

/* Etc */
#header, #aside{
  position: relative;
  z-index: 99
}
#images {
  z-index: 0;
}
#images img{
  margin: 0.2em;
  border: 1px solid #888;
  padding: 3px;
  float: right;
}
#images video{
  float: right;
}
#header, #content{
  background-color: white;
}
#pagenav {
  padding: 0 1em;
  border-top: 1px solid #aaa;
  border-bottom: 1px solid #aaa;
}
#pagenav li{
  padding: 0 0.5em;
}
#pagenav a{
  text-transform: uppercase;
  font-size: 0.8em;
  text-decoration: none;
  color: #35c;
  <?php serif_bold(); ?>
}
#aside{  border-top: 2px dashed #ccc;}
body {
  background: #eee;
}
