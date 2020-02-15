<!DOCTYPE html>
<html lang="ja" >
  <?php include('views/head.inc.php'); ?>
  <body>
    <?php include('views/header.inc.php'); ?>

    <h1>投稿内容の修正</h1>

    <form class="form" action="update.php" method="post">
      <div class="form-gloup">
        <label class="control-label">タイトル</label>
        <textarea class="form-control" type="text" name="title" rows="2" cols="20" ><?= $results[0]['title']?></textarea>
      </div>
      <div class="form-gloup">
        <label class="control-label">投稿者名</label>
        <input class="form-control" type="text" name="presenter" value="<?= $results[0]['presenter']?>" >
      </div>
      <div class="form-gloup">
        <label class="control-label">ABSTRACT</label>
        <textarea class="form-control" type="text" name="abstract" rows="8" cols="80" ><?= $results[0]['abstract']?></textarea>
      </div>
      <label class="control-label">KeyWord 1</label>
      <input class="form-control" type="text" name="keyword1" value = "<?= $results[0]['keyword1']?>" >
      <label class="control-label">KeyWord 2</label>
      <input class="form-control" type="text" name="keyword2" value = "<?= $results[0]['keyword2']?>">
      <label class="control-label">KeyWord 3</label>
      <input class="form-control" type="text" name="keyword3" value = "<?= $results[0]['keyword3']?>">
      <div class="form-gloup">
        <label class="control-label">本文</label>
        <textarea class="form-control" name="maintext" rows="15" cols="80"><?= $results[0]['maintext']?></textarea>
      </div>
      <input type="hidden" name="id" value="<?= $id?>">
      <button class="btn-square">修正内容を送信</button>
    </form>
    <?php include('views/footer.inc.php'); ?>
  </body>
</html>
