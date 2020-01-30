<?php
require_once('template/config.php');

$id = $_GET['id'];
// データベースから受け取る
$pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD );
$sql = "select * from journal where id = :id LIMIT 1"; /*sql命令の定義 */

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$stmt -> execute();

$results = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $results []=$row;
}

  $stmt = null;
  $pdo = null;


require_once('views/delete.tpl.php');
 ?>
