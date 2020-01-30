<!DOCTYPE html>
<html lang="ja">
<?php include('views/head.inc.php'); ?>
  <body>
    <?php include('views/header.inc.php'); ?>

    <div class="upload">
    <div class="upload-container">
      <div class="title">
        <p>タイトル</p>
        <p><?= $results[0]["title"] ?></p>
      </div>
      <div class="presenter">
        <p>発表者</p>
        <p><?= $results[0]["presenter"] ?></p>
      </div>
      <div class="intr">
        <p>Abstract</p>
        <p><?= $results[0]["abstract"] ?></p>
      </div>
      <div class="keyword">
        <p>Key Word</p>
        <p><?= $results[0]["keyword1"] ?></p>
        <p><?= $results[0]["keyword2"] ?></p>
        <p><?= $results[0]["keyword3"] ?></p>
      </div>
      <div class="maintext">
        <p>本文</p>
        <p><?= $results[0]["maintext"] ?></p>
      </div>
    </div>
    </div>
  <div class="menu-container">
    <form class="form" action="edit.php?id=<?=$results[0]["id"] ?>" method="post">
      <button class="btn-square">投稿内容の修正</button>
    </form>
    <form class="form" action="delete.php?id=<?=$results[0]["id"] ?>" method="post">
      <button class="btn-square">投稿の削除</button>
    </form>
    <form class="form" action="comment.php?id=<?=$results[0]["id"] ?>" method="post">
      <button class="btn-square">コメント</button>
    </form>
  </div>
    <?php include('views/footer.inc.php'); ?>
  </body>
</html>
