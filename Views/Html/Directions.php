<?php
class DirectionsPage extends BasePage{
  function __construct($request) {
  }
  function echoTitle()
  {
    echo "Getting to XIE";
  }
  function echoContent() {
    ?><iframe width="600" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=d&amp;source=s_d&amp;saddr=Senapati+Bapat+Marg&amp;daddr=R+Hospital+Marg&amp;hl=en&amp;geocode=FRiJIgEdtIxXBA%3BFW-cIgEdfHlXBA&amp;mra=me&amp;mrsp=1,0&amp;sz=16&amp;sll=19.042282,72.843003&amp;sspn=0.020283,0.036328&amp;ie=UTF8&amp;ll=19.041105,72.842875&amp;spn=0.019472,0.051498&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=d&amp;source=embed&amp;saddr=Senapati+Bapat+Marg&amp;daddr=R+Hospital+Marg&amp;hl=en&amp;geocode=FRiJIgEdtIxXBA%3BFW-cIgEdfHlXBA&amp;mra=me&amp;mrsp=1,0&amp;sz=16&amp;sll=19.042282,72.843003&amp;sspn=0.020283,0.036328&amp;ie=UTF8&amp;ll=19.041105,72.842875&amp;spn=0.019472,0.051498&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small><?php
  }
}