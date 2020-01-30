<?php

require_once('template/config.php');

$id = $_GET['id'];

// データベースへ削除命令
$pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD );
$sql = 'DELETE FROM journal WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$stmt->execute();

$stmt = null;
$pdo = null;

require_once 'views/delete-complate.tpl.php';
