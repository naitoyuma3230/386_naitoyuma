<!DOCTYPE html>
<html lang="ja" >
<?php include('views/header.inc.php'); ?>
  <body>
    <h1>RPG戦闘フォーム</h1>
    <p><?php echo $message ?></p>
      <form action="battle.php" method="post">
        <!-- result.phpをgetメソッドで呼び出す
          getメソッドではURLの末尾に入力情報が記載される
          他者に見られやすいため注意-->
          <select name="name">
            <?php foreach ($players as $player) { ?>
              <option value="<?php echo $player ?>">
                <?php echo $player ?>
              </option>
            <?php }; ?>
          </select>
          <p></p>
          <button type="submit">たたかう</button>
        </form>
          <form action="battle.php" method="get">
            <button type="submit" >にげる</button>
          </form>


        <!-- <label for="article">投稿</label>
        <input type="text" name="article" >
        <p></p>
        <label for="name">名前</label>
        <input type="text" name="name">
        <button type="submit" >送信する</button> -->

        <p>
          <?php
            if(isset($article)){
              echo $article . ',';
            }
            if(isset($name)){
              echo $name ;
            }
           ?>
        </p>



    <?php include('views/footer.inc.php'); ?>
  </body>
</html>
