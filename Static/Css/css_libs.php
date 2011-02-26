<?php
header("Content-type: text/css"); 
function serif(){
  echo "font-family: 'DejaVuSerifBook', serif;\n";
}
function serif_bold(){
  echo "font-family: 'DejaVuSerifBold', serif;\n";
}
function serif_italic(){
  echo "font-family: 'DejaVuSerifItalic', serif;\n";
}
function sans(){
  echo "font-family: 'DejaVuSansBook', sans-serif;\n";
}
function sans_bold(){
  echo "font-family: 'DejaVuSansBold', sans-serif;\n";
}
function sans_italic(){
  echo "font-family: 'DejaVuSansOblique', sans-serif;\n";
}
function vendor_prefix($prop)
{
  $prefixes = array("webkit", "moz", "o", "ms");
  echo "\t$prop;\n";
  foreach($prefixes as $prefix)
  {
    echo "\t-$prefix-$prop;\n";
  }
}
?>