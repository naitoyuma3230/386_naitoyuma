<?php
namespace MyApp\Model;

class User extends \MyApp\Model{

    public function create($values){
        $stmt = $this->db->prepare("insert into users (email,password,created,
        modified) values (:email, :password, now(), now())");

        $res = $stmt->execute([
            ':email' => $values['email'],
            ':password' => password_hash($values['password'], PASSWORD_DEFAULT)
            // password_hash:ハッシュ＝細かく刻む、パスワードに対するセキュリティ処理
        ]);
        if($res === false){
            throw new \MyApp\Exception\DuplicateEmail();
            // データベース設定上emailカラムはUnique属性なので重複するとfalseとなる
        }
    }

    public function login($values){
        $stmt = $this->db->prepare("select * from users where email = :email");
        // prepare:ユーザーからの入力を利用してDBを操作
        // 1.入力の受付準備(prepare)
        // 2.入力情報をSQL文に挿入(bind)
        // 3.SQL実行(execute) 

        $stmt->execute([
            ':email' => $values['email']
            ]);
        // bind省略の型
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
        $user = $stmt->fetch();

        if(empty($user)){
            throw new \MyApp\Exception\UnmatchEmailOrPassword();
        }

        if(!password_verify($values['password'], $user->password)){
            throw new \MyApp\Exception\UnmatchEmailOrPassword();
        }

        return $user;
    }

    public function findAll(){
        $stmt = $this->db->query("select * from users order by id");
        // query:ユーザーからの入力情報を利用しない場合
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
        return $stmt->fetchAll();

    }
}