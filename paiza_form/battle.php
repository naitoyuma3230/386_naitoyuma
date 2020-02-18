<?php
  $players = ['勇者','戦士','魔法使い','忍者'];
  if(isset($_REQUEST['name'])){
    $message = htmlspecialchars($_REQUEST['name']) .'はモンスターと戦った';
  }else{
    $message = '新しいモンスターが現れた';
  };
  require_once 'views/battle.tpl.php';

 ?>
