<?php

require_once(__DIR__ . '/../config/config.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
		if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']){
				echo "Invaild token!";
				exit;
				// POST[token]が空,もしくはPOSTとSESSIONのtokenが一致しない場合
				// 他のURLからのPOSTを弾く
			}


		
		$_SESSION = [];

		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(), '', time() - 86400, '/');
		}

		session_destroy();
		// cookieとsessionをリセット
}

header('Location: ' . SITE_URL);