<!DOCTYPE html>
<html lang="ja">
<?php include('views/head.inc.php'); ?>
  <body>
    <?php include('views/header.inc.php'); ?>
    <div class="main-container">
      <h1>シンプル発表会</h1>
      <p>Standing on the shoulders of giants</p>
    </div>

      <img class="main-image" src="image/main_img_illustration.jpg" alt="*">

    <div class="share">
        <div class="output">
          <h2>アウトプットが9割！</h2>
          <h2>症例検討や論文をシェアしよう</h2>
        </div>
        <div class="share-comment">
          <p>今までの症例発表や論文発表、これからする予定も含め</p>
          <p>内容について意見を交換しよう</p>
        </div>
    </div>
    <div class="login">
      <a href="#" >ログイン</a>
      <a href="#" >新規登録</a>
      <a href="register.php" >抄録の投稿</a>
    </div>
    <div class="upload">
    <?php foreach ($results as $result) { ?>
    <div class="upload-container">
      <div class="title">
        <p>タイトル</p>
        <a class="title-link" href="menu.php?id=<?= $result["id"]?>">
        <p><?= $result["title"] ?></p></a>
      </div>
      <div class="presenter">
        <p>発表者</p>
        <p><?= $result["presenter"] ?></p>
      </div>
      <div class="intr">
        <p>Abstract</p>
        <p><?= $result["abstract"] ?></p>
      </div>
      <div class="keyword">
        <p>Key Word</p>
        <p><?= $result["keyword1"] ?></p>
        <p><?= $result["keyword2"] ?></p>
        <p><?= $result["keyword3"] ?></p>
      </div>
    </div>
  <?php } ?>
    </div>
    <div class="next">
      <a href="#" >次のページ</a>
    </div>
    <?php include('views/footer.inc.php'); ?>
  </body>
</html>
