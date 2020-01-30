<?php
  // function h($s){
  //   return htmlspecialchars($s,ENT_QUOTES,"UTF-8");
  // }

require_once('template/config.php');

// データベースからデータを受け取る
$pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD );
$sql = "select * from journal"; /*sql命令の定義*/

$stmt = $pdo->prepare($sql);
$stmt -> execute();


// データを変数に格納
$results = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $results []=$row;
}

  $stmt = null;
  $pdo = null;

?>


<?php require_once('views/main.tpl.php'); ?>
