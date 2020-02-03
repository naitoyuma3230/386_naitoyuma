<?php
  namespace MyApp\Controller;
  // 名前空間を設定

  class Signup extends \MyApp\Controller{  /*Controllerクラスを継承*/

    public function run(){
      if($this->isLogeedIn()){
        // Login済み 現在のURLを再読み込み
        header('Location: ' . SITE_URL);/* $_SERVER['HTTP_HOST'] 現在のアドレス、ポートを取得*/
        exit;
      }
      if ($_SERVER['REQUEST_METHOD'] === 'POST'){/*POSTメソッドでアクセスしたなら*/
        $this->postProcess();
// $_SERVER :サーバーの様々な情報を取得する際のアクセス変数
// $_SERVER['REQUEST_METHOD'] :現在のページにアクセスする際に使用されたメソッド(POST,GETなど)を返す
      }
    }

    protected function postProcess(){
    // formに投稿された情報の検証、ユーザーDBに登録、リダイレクトするメソッド


    /*例外処理 Expection：エラー（例外）によるプログラムの異常終了を防ぐ
    例外について throw(発生、投げられる) tryブロック(検証) catchブロック(補足,処理の実行)
    throwされるクラスはExceptionクラスか継承したサブクラスでなければいけない

    try {

    //例外が発生する可能性があるコード

    throw new 例外クラス名(引数) インスタンス作成

  }catch(例外クラス名 例外を代入する変数名){ 例外クラス名で捕捉→クラスを変数に代入

    //例外が発生した場合に行う処理

    }*/



    // validate:検証
      try{
        $this->_validate();
        // エラー条件に引っかかったらInvaildクラスを投げる
      }catch(\MyApp\Exception\InvalidEmail $e){
        // echo $e->getMessage();/*Invaildemailクラスを変数$e(exception)に代入$e->*/
        // exit;
        $this->setErrors('email',$e->getMessage());

      }catch(\MyApp\Exception\InvalidPassword $e){
        // echo $e->getMessage();
        // exit;
        $this->setErrors('password',$e->getMessage());
      }

        $this->setValues('email' , $_POST['email']);
        // 例外処理の後に クラス_values emailプロパティをFromに入力された値に設定する

        if ($this->hasError()){
          return;
        }else{
     // create user

      // redirect to login

        }
        // echo "success";
        // exit;
    }
      private function _validate(){
        if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']){
          echo "Invaild token!";
          exit;
        }

        if (!filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)){
          /*filter_var('info@wepicks.net', FILTER_VALIDATE_EMAIL)
          filter_var:データ検証メソッド （第一引数：チェックしたい変数 第二引数：FILTER_VALIDATE.オプション)*/
          // emailの検証
          throw new \MyApp\Exception\InvalidEmail();/*例外を投げる*/
        }

        if (!preg_match('/\A[a-zA-Z0-9]+\z/' , $_POST['password'])){
          /*preg_match :正規表現の検索 戻り値0:truth 1:false
          返り値 = preg_match(/正規表現パターン/,検索対象の文字列,[配列],[動作フラグ],[検索開始位置])
          正規表現 \A:入力の先頭から\z:入力の末尾までが[a-zA-Z0-9]:Aa 〜 Zz と 0 〜 9で構成されているか */
          // passwordの検証
          throw new \MyApp\Exception\InvalidPassword();
        }
      }




    }
