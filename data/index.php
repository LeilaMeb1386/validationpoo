<?php
  require_once('./controls/view.php');
  $view = new flowers($_SERVER['REQUEST_URI']);
  $view->renderView();
