<?php
namespace MyApp\Exception;

class InvalidPassword extends \Exception{
// MyApp(名前空間(libフォルダ))\Exception(サブ名前空間・子フォルダ名)\Exception(このファイルのクラス名)
// Autoloadの設定上クラスの前に\が入らなければならない。↑は本来呼び出す際の形
  protected $message = 'Invalid Password';
}
