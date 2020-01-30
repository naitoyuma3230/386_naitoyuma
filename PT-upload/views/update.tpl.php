<!DOCTYPE html>
<html lang="ja">
<?php include('views/head.inc.php'); ?>
  <body>
    <?php include('views/header.inc.php'); ?>

    <h1>登録内容の変更完了</h1>

    <div class="upload">
    <div class="upload-container">
      <div class="title">
        <p>タイトル</p>
        <p><?= $title ?></p>
      </div>
      <div class="presenter">
        <p>発表者</p>
        <p><?= $presenter ?></p>
      </div>
      <div class="intr">
        <p>Abstract</p>
        <p><?= $abstract ?></p>
      </div>
      <div class="keyword">
        <p>Key Word</p>
        <p><?= $keyword1 ?></p>
        <p><?= $keyword2 ?></p>
        <p><?= $keyword3 ?></p>
      </div>
      <div class="maintext">
        <p>本文</p>
        <p><?= $maintext ?></p>
      </div>
    </div>
    </div>

    <?php include('views/footer.inc.php'); ?>
  </body>
</html>
