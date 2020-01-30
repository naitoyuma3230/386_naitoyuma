<?php
  require_once('template/config.php');

  session_start();
  if( isset($_SESSION['user']) != ''){
    // セッションに値が保存されている＝ログイン済の場合
    header("Location: home.php");
  }
  // signupがPOSTされたときに下記を実行
    if(isset($_POST['signup'])) {

      $username = htmlspecialchars($_POST['username']);
      $email = htmlspecialchars($_POST['email']);
      $password = htmlspecialchars($_POST['password']);
      $password = password_hash($password,PASSWORD_DEFAULT);


    // POSTされた情報をDBに格納する
    $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = 'INSERT INTO users(username,email,password)
            VALUES (:username, :email, :password)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username',$username,PDO::PARAM_STR);
    $stmt->bindValue(':emall',$email,PDO::PARAM_STR);
    $stmt->bindValue(':password',$password,PDO::PARAM_STR);
    $stmt->execute();

    if($mysqli->query($query)) {  ?>
    <div class="alert alert-success" role="alert">登録しました</div>
    <?php } else { ?>
    <div class="alert alert-danger" role="alert">エラーが発生しました。</div>
    <?php
  }
}

  ?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHPの会員登録機能</title>
<link rel="stylesheet" href="style.css">

<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="col-xs-6 col-xs-offset-3">

<form action="signUp.php" method="post" >
  <h1>登録フォーム</h1>
  <div class="form-group">
    <input type="text" class="form-control" name="username" placeholder="ユーザー名" required />
  </div>
  <div class="form-group">
    <input type="email"  class="form-control" name="email" placeholder="メールアドレス" required />
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="パスワード" required />
  </div>
  <button type="submit" class="btn btn-default" name="signup">ユーザー登録する</button>
  <a href="index.php">ログインはこちら</a>
</form>

</div>
</body>
</html>
