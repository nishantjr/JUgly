<?php
class BaseController {
  function invoke($request)
  {
    //save
    global $_SESSION, $config;
    session_start();
    if(isset($request["password"]) and $request["password"]===$config["password"] )
    {
      $_SESSION["password"] = $request["password"];
    }
    if(isset($request["save"]) and $_SESSION["password"]===$config["password"])
    {
      ArticleModel::save($request);
    }

    $view = new HtmlView($request);
    $view->put();
  }
}