<?php
$id = htmlspecialchars($_REQUEST['id']);
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
$sql =  'UPDATE journal
        SET title = :title, presenter = :presenter, abstract = :abstract, keyword1 = :keyword1, keyword2 = :keyword2, keyword3 = :keyword3, maintext = :maintext
        WHERE id = :id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$stmt->bindValue(':title',$title,PDO::PARAM_STR);
$stmt->bindValue(':presenter',$presenter,PDO::PARAM_STR);
$stmt->bindValue(':abstract',$abstract,PDO::PARAM_STR);
$stmt->bindValue(':keyword1',$keyword1,PDO::PARAM_STR);
$stmt->bindValue(':keyword2',$keyword2,PDO::PARAM_STR);
$stmt->bindValue(':keyword3',$keyword3,PDO::PARAM_STR);
$stmt->bindValue(':maintext',$maintext,PDO::PARAM_STR);
$stmt->execute();
// $stmt->execute([
//   ":title" => $title,
//   ":presenter" => $presenter,
//   ":abstract" => $abstract,
//   ":keyword1" => $keyword1,
//   ":keyword2" => $keyword2,
//   ":keyword3" => $keyword3,
//   ":maintext" => $maintext,
//   ":id" => $id
// ]);


$stmt = null;
$pdo = null;


require_once('views/update.tpl.php');
 ?>
