<?php
include("config.php");
//Route
if(!isset($_REQUEST["controller"])) $_REQUEST["controller"]="Base";
$controller = $_REQUEST["controller"];
$controller .= "Controller";

//Error
function errorHandler($number, $string, $file, $line, $context)
{
  
  echo "<div><b>Error:</b> $string in <b>$file::$line</b>";
  echo "<pre>";
  var_dump($context);
  echo "</pre>";
  echo  "</div>";
}
set_error_handler("errorHandler");

//Autoload
function __autoload($className) 
{
    $objects = array("Model" => "./Models/", 
		     "View"  => "./Views/",
		     "Page"  => "./Views/Html/",
		     "Controller"  => "./Controllers/");
    foreach($objects as $object => $path)
    if(strpos($className, $object))
    {
      $file = substr($className, 0, -1*strlen($object));
      include $path.$file.".php";
    }
}

$controller = new $controller;
$controller->invoke($_REQUEST);