<?php
  $message = 'This is paiza';

  $article = htmlspecialchars($_REQUEST['article']);
  $name = htmlspecialchars($_REQUEST['name']);
  // htmlspecialcharsで入力された文字列にhtmlコードが含めれてもバグらない

  require_once 'views/battle.tpl.php';
 ?>
