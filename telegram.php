<?php
	require_once "sys/telegram.class.php";

	$sender = new Telegram();
	$sender->token = "227521073:AAHiaG6tlSQ5Ozc_p-hJ_joJISxK0gJHdKI";

	$arr = $sender->getUpdates();
	
	$userChatId =  $arr['result'][0]['message']['from']['id'];
	$sender->sendMessage($userChatId, "Test");
?>