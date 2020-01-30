<?php
// ユーザーの一覧

require_once(__DIR__ .'/../config/config.php');
require_once(__DIR__ .'/../lib/Controller/Index.php');

$app = new MyApp\Controller\Index();

$app->run();
