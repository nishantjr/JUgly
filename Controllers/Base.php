<?php
class BaseController {
  function invoke($request)
  {
    //save
    if(isset($request["save"]))
    {

      ArticleModel::save($request);
    }

    $view = new HtmlView($request);
    $view->put();
  }
}