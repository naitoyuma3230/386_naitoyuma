<?php
$title = htmlspecialchars($_REQUEST['title']);
$presenter = htmlspecialchars($_REQUEST['presenter']);
$abstract = htmlspecialchars($_REQUEST['abstract']);
$keyword1 = htmlspecialchars($_REQUEST['keyword1']);
$keyword2 = htmlspecialchars($_REQUEST['keyword2']);
$keyword3 = htmlspecialchars($_REQUEST['keyword3']);
$maintext = htmlspecialchars($_REQUEST['maintext']);

require_once('template/config.php');

// データベースに書き込み
$pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD );
$sql = 'INSERT INTO journal(title,presenter,abstract,keyword1,keyword2,keyword3,maintext)
        VALUES (:title, :presenter, :abstract, :keyword1, :keyword2, :keyword3, :maintext)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title',$title,PDO::PARAM_STR);
$stmt->bindValue(':presenter',$presenter,PDO::PARAM_STR);
$stmt->bindValue(':abstract',$abstract,PDO::PARAM_STR);
$stmt->bindValue(':keyword1',$keyword1,PDO::PARAM_STR);
$stmt->bindValue(':keyword2',$keyword2,PDO::PARAM_STR);
$stmt->bindValue(':keyword3',$keyword3,PDO::PARAM_STR);
$stmt->bindValue(':maintext',$maintext,PDO::PARAM_STR);
$stmt->execute();

$stmt = null;
$pdo = null;

require_once 'views/complate.tpl.php';
