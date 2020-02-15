<!DOCTYPE html>
<html lang="en" >
<?php include('views/head.inc.php'); ?>
<body>
  <?php include('views/header.inc.php'); ?>
  <div class="main-container">
    <h1>シンプル発表会</h1>
    <p>Standing on the shoulders of giants</p>
  </div>

  <h2>抄録の投稿</h2>
  <form class="form" action="confirmation.php" method="post">
    <div class="form-gloup">
      <label class="control-label">タイトル</label>
      <textarea class="form-control" type="text" name="title" rows="2" cols="20" required></textarea>
    </div>
    <div class="form-gloup">
      <label class="control-label">投稿者名</label>
      <input class="form-control" type="text" name="presenter" required>
    </div>
    <div class="form-gloup">
      <label class="control-label">ABSTRACT</label>
      <textarea class="form-control" type="text" name="abstract" rows="8" cols="80" required></textarea>
    </div>
    <label class="control-label">KeyWord 1</label>
    <input class="form-control" type="text" name="keyword1" required >
    <label class="control-label">KeyWord 2</label>
    <input class="form-control" type="text" name="keyword2" required>
    <label class="control-label">KeyWord 3</label>
    <input class="form-control" type="text" name="keyword3" required>
    <div class="form-gloup">
      <label class="control-label">本文</label>
      <textarea class="form-control" name="maintext" rows="15" cols="80" required></textarea>
    </div>
    <button class="btn-square">投稿確認</button>
  </form>
  <?php include('views/footer.inc.php'); ?>
  <body>
</html>
