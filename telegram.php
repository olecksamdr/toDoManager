<?php
	require_once "sys/telegram.class.php";

	$sender = new Telegram();
	$sender->token = "227521073:AAHiaG6tlSQ5Ozc_p-hJ_joJISxK0gJHdKI";

	$arr = $sender->getUpdates();
var_dump($arr);
	$userChatId = $arr['result'][0]['message']['from']['id'];
	for($i = 0; $i < 10; $i++){
		echo $msg = $arr['result'][$i]['message']['text']."<br />";
	}



	$params = [];
	$params['parse_mode'] = 'HTML';
	$params['disable_notification'] = true;

	// $sender->sendMessage($userChatId, 'Test http://www.example.com/', $params); //link sented withot <a></a> pares
?>