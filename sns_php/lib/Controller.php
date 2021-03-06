<?php

// new ブランチで管理テスト
namespace MyApp;

class Controller{

  private $_errors;
  private $_values;

  public function __construct(){
    if(!isset($_SESSION['token'])){
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
      // bin2hex:指定した文字列を16進数に変換する
      // openssl_random_pseudo_bytes(16):ランダム性の高い32桁の数列
    }
  /*__construct:クラスからオブジェクトの作成(new）の際に自動的に実行されるメソッド*/
    $this->_errors = new \stdClass();
    $this->_values = new \stdClass();
    // $this->_values = new \stdClass();
    // new stdClass:クラス定義なしでオブジェクトを作成可能.オブジェクトのメソッドの形で関数を実行できる
  }

  protected function setValues($key, $value){
    $this->_values->$key = $value;
  }

  public function getValues(){
    return $this->_values;
  }

  protected function setErrors($key, $error){
    $this->_errors->$key = $error;
    // $this(class Controler)->_errors(stdClassのインスタンス)->$key(そのプロパティ)
  }

  public function getErrors($key){
    return isset($this->_errors->$key) ? $this->_errors->$key :'';
    // 三項演算子：式1 ? 式2 : 式3
    // 式1がtrue->式2. false->式3
  }

  protected function hasError(){
    return !empty(get_object_vars($this->_errors));
    // get_object_vars:オブジェクト内のプロパティを取得
  }

  protected function isLogeedIn(){/*protectedは同クラス内からのみアクセス可能（Extends：サブクラスは不可）*/
    // $_SESSION['me']
    // SESSION： webサイトへのアクセスからブラウザを閉じるまでの一連の行動
    // webで用いられるHTTPプロトコルには状態を管理する機能がないため$_SESSION関数を使用する
    // SESSIONはサーバーサイド Cookieはクライント側が保持する
    return isset($_SESSION['me']) && !empty($_SESSION['me']);/*戻り値：Yes or No*/
  }

  public function me(){
    return $this->isLogeedIn() ? $_SESSION['me'] : null;
  }

}
