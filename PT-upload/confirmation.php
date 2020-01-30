<?php

  $title = htmlspecialchars($_REQUEST['title']);
  $presenter = htmlspecialchars($_REQUEST['presenter']);
  $abstract = htmlspecialchars($_REQUEST['abstract']);
  $keyword1 = htmlspecialchars($_REQUEST['keyword1']);
  $keyword2 = htmlspecialchars($_REQUEST['keyword2']);
  $keyword3 = htmlspecialchars($_REQUEST['keyword3']);
  $maintext = htmlspecialchars($_REQUEST['maintext']);

  require_once 'views/confirmation.tpl.php' ;
