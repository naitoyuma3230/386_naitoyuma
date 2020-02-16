<?php
  $nums = [];
  // range(1,20);　rangeは範囲内の数値を区切って配列として代入できる
  // shuffle($int);
  //$ex = array_slice($int,0,3); 任意の範囲を選択して代入
  for ($i = 0; $i<5; $i++ ){
    $col = range($i * 15 + 1, $i * 15 +15);
    shuffle($col);
    $nums[$i] = array_slice($col, 0, 5);
  }
  // $nums[$i] $i * 15 + 1 ~ $i * 15 +15   i=0〜5
  function h($s){
    return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}
$nums[2][2]= "free";
var_dump($nums);

 ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>BINGO!</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div id="container">
        <table>
       <tr>
         <th>B</th><th>I</th><th>N</th><th>G</th><th>O</th>
       </tr>
       <?php for ($i = 0; $i < 5; $i++) : ?>
       <tr>
         <?php for ($j = 0; $j < 5; $j++) : ?>
         <td><?= h($nums[$j][$i]); ?></td>
         <?php endfor; ?>
       </tr>
       <?php endfor; ?>
     </table>
    </div>
  </body>
</html>
