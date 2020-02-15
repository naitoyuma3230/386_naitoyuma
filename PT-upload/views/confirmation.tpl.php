<!DOCTYPE html>
<html lang="ja" >
  <?php include('views/head.inc.php'); ?>
  <body>
    <?php include('views/header.inc.php'); ?>

    <h2 id="confirm-t">投稿内容の確認</h2>

    <form class="form" action="complate.php" method="post">
      <div class="form-gloup">
        <label class="control-label">タイトル</label>
        <textarea class="form-control" type="text" name="title" rows="2" cols="20" value="<?= $title?>"><?= $title?></textarea>
      </div>
      <div class="form-gloup">
        <label class="control-label">投稿者名</label>
        <input class="form-control" type="text" name="presenter" value="<?= $presenter?>" >
      </div>
      <div class="form-gloup">
        <label class="control-label">ABSTRACT</label>
        <textarea class="form-control" type="text" name="abstract" rows="8" cols="80" ><?= $abstract?></textarea>
      </div>
      <label class="control-label">KeyWord 1</label>
      <input class="form-control" type="text" name="keyword1" value = "<?= $keyword1?>" >
      <label class="control-label">KeyWord 2</label>
      <input class="form-control" type="text" name="keyword2" value = "<?= $keyword2?>">
      <label class="control-label">KeyWord 3</label>
      <input class="form-control" type="text" name="keyword3" value = "<?= $keyword3?>">
      <div class="form-gloup">
        <label class="control-label">本文</label>
        <textarea class="form-control" name="maintext" rows="15" cols="80"><?= $maintext?></textarea>
      </div>
      <button class="btn-square">この内容で送信</button>
    </form>
    <?php include('views/footer.inc.php'); ?>
  </body>
</html>
