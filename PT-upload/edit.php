<?php
require_once('template/config.php');

$id = $_GET['id'];

// データベースからデータを受け取る
$pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD );
$sql = "select * from journal where id = :id"; /*sql命令の定義 */

$stmt = $pdo->prepare($sql); /*変数stmtにデータベースに対するsql実行コードを格納*/
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
// sqlに変数を代入 id→$id,データ型(数字)指定
// PDOはphpからデータベースへのアクセスを全てのsqlに対応させてくれる
$stmt->execute(); /*実行*/

// データを変数に格納
// fetchでデータベースから受け取ったデータ配列$stmtをWhileで各カラム毎変数に代入
$results = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $results []=$row;
};
$stmt = null;
$pdo = null;

require_once('views/edit.tpl.php');
 ?>
