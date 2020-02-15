<?php
  namespace MyApp\Controller;
  // 名前空間を設定

  class Index extends \MyApp\Controller{  /*Controllerクラスを継承*/

    public function run(){
      if(!$this->isLogeedIn()){
        // not login login.phpへリダイレクト
        header('Location: ' . SITE_URL . '/login.php');/* $_SERVER['HTTP_HOST'] 現在のアドレス、ポートを取得*/
        exit;
      }

      // get users info
      $userModel = new \MyApp\Model\User();
      $this->setValues('users' , $userModel->findAll());
    }
  }
