<?php

ini_set('display_errors',1); //ブラウザーエラー表示

define('DSN','mysql:dbhost=localhost;dbname=dotinstall_sns_php');
define('DB_USERNAME','dbuser');
define('DB_PASSWORD','7110');

define('SITE_URL','http://'. $_SERVER['HTTP_HOST']);/* $_SERVER['HTTP_HOST'] 現在のアドレス、ポートを取得*/

require_once(__DIR__. '/../lib/functions.php');
require_once(__DIR__. '/autoload.php');

session_start();
