<?php
require_once('template/config.php');

$id = $_GET['id'];
// データベースからデータを受け取る
$pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD );
$sql = "select * from journal where id = :id"; /*sql命令の定義 */

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$stmt -> execute();

// データを変数に格納
$results = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $results []=$row;
};

  $stmt = null;
  $pdo = null;

include('views/menu.tpl.php');
?>
