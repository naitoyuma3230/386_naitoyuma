<?php

/*
  オートロード：インスタンス作成時にクラスの読み込みを自動で行う
  MyApp　名前空間
  index.phpに関するcontrollerクラスを呼び出すためにlibフォルダ内のPHPファイルを検索→オートロード
  インスタンスを作成する時にMyApp(名前空間)\Controller(サブ名前空間)\Index(クラス名)で呼び出すが
  その際、lib(フォルダ)/Controller(フォルダ)/index.php(Indexクラスがあるファイル)の絶対パスに変換して検索したい
  

*/

  spl_autoload_register(function($class){/*spl_autoload_register()：クラスを継承する際、そのクラスが定義されていない場合に自動的に実行されるメソッド*/
    $prefix = 'MyApp\\'; /*prefix：頭文字的なもの MyApp\は\\でエスケープ  */
    if(strpos($class,$prefix) === 0){ /*strposで変数内の文字列を検索。その場所が0＝先頭であれば…*/
      $className = substr($class,strlen($prefix));/*substr：文字列の一部を切り出す関数。strlenで名前空間の文字数を指定し、以降の文字列を取得する*/
      $classFilePath = __DIR__ .'/../lib/' . str_replace('\\','/',$className) . '.php';
      /*__DIR__:この定数が呼び出されたファイルがあるディレクトリのフルパスを返す
      /../lib/:親フォルダ->libフォルダのパス
      $classNameの\を/に変換　最後に.phpをつける
      ->名前空間を指定することで、呼び出したい複数のクラスファイルの絶対パスと名前を取得できる*/
      if(file_exists($classFilePath)){
        require $classFilePath; /*指定したファイルパスが存在すれば読み込む*/
      }
    }
  });
