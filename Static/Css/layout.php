<?php include("css_libs.php"); ?>
/*<style>*/
/* Reset */
* {
 margin: 0;
 padding: 0;
 list-style-type: none;
}
body, html{min-width: 1000px;}
/* Ok Start by getting the bottom menu looking good */
.eventlist-category, .eventlist-section {
  display: inline-block;/*All in a row*/
  vertical-align: top;
}
.eventlist-section-title{
  margin-bottom: 0.8em;
}
.eventlist-section{
  width: 8.48em;
}
.eventlist-category {
  margin-left: 0.4em;
}
#pagenav li {
  display: inline-block;
}
/* Main and aside have their contents centered */
#aside{ width: 100%;}
#content {
  height: 300px;
  width: 100%;
}
#header {
  padding-left: 5em;
  height: 75px;
}
#centerbox, #eventlist{/*center*/
 margin: auto;
 width: 1000px;/*No scroll bars at 1024x* */
 height: 100%;
}
#pagenav{
  display: table;
  margin: auto;
}
#eventlist{
  padding-bottom: 0.2em;
  padding-top: 0.2em;
}
#centerbox{  position: relative }

#article, #images{
  display: inline-block;
  position: absolute;
  padding-bottom: 0.5em;
  bottom: 1em;
}
#article{
  width: 56.5%;
  right: 0px; 
}
#images{
  width: 41%;
  left: 0px;
}
.info-title{display: table-caption}
.info-box{
  display:table;
  float: left;
  padding-right: 0.5em;
  padding-bottom: 0.2em;
}
.info-item{display: table-row;}
.info-data, .info-label{display: table-cell}