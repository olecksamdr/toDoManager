<?php
require_once 'init.php';

$sql = "SELECT * FROM `tasks` WHERE `completed` != '1' AND `active` = '1' AND `expiredBy` < '".date('Y-m-d', strtotime('+2 days'))."'";
$allTaskToSender = $db->query($sql);
while($taskToNotif = $allTaskToSender->fetch()){
	$u = new User($taskToNotif['userId']);
	$message = 'Yor task '.$taskToNotif['title'].' will overdued '.$taskToNotif['expiredBy'];

	if ($u->telegramNotifs) {
    	$sender->sendMessage($u->chatId, $message);
	}
	if ($u->emailNotifs) {
		Mail::sendOfMail($u->email, 'Task overduer', $message);
	}
}
?>
