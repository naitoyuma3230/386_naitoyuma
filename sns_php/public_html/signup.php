<?php
// ログイン

require_once(__DIR__ .'/../config/config.php');
//
$app = new MyApp\Controller\Signup();

$app->run();

// echo "login screen";
// exit;
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div id="container">
      <form action="" method="post" id="signup">
        <p>
          <input type="text" name="email" placeholder="email" value="<?=
          isset($app->getValues()->email) ? h($app->getValues()->email) : ''; ?>">
        </p>
        <p class = "err"><?= h($app->getErrors('email')); ?></p>
        <p>
          <input type="password" name="password" placeholder="password">
        </p>
        <p class = "err"><?= h($app->getErrors('password')); ?></p>

        <div class="btn" onclick="document.getElementById('signup').submit();">Sign Up</div>
        <!-- クリックアクションでFormのid='signup'を取得してsubmit関数を実行。
        Signup.phpはPostでのリダイレクトでform情報の検証エラーメッセージの受け取った取りを行う-->
        <p class="fs12"><a href="/login.php">Log In</a></p>
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
        <!-- Signup.phpで設定された$_SESSION['token']の値をForm情報としてPost送信 -->

      </form>

    </div>
  </body>
</html>
