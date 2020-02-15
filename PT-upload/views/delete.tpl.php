<!DOCTYPE html>
<html lang="ja">
<?php include('views/head.inc.php'); ?>
  <body>
    <?php include('views/header.inc.php'); ?>
    <h1>削除確認</h1>
    <h3>この投稿も削除してもよろしいですか？</h3>
    <div class="upload-container">
      <div class="title">
        <p>タイトル</p>
        <p><?= $results[0]["title"] ?></p>
      </div>
      <div class="presenter">
        <p>発表者</p>
        <p><?= $results[0]["presenter"] ?></p>
      </div>
    </div>
    <div class="menu-container">
      <form class="form" action="delete-complate.php?id=<?=$results[0]["id"] ?>" method="post">
        <button class="btn-square">投稿の削除</button>
      </form>
      <form class="form" action="menu.php?id=<?=$results[0]["id"] ?>" method="post">
        <button class="btn-square">戻る</button>
      </form>
    </div>
    <?php include('views/footer.inc.php'); ?>
  </body>
</html>
