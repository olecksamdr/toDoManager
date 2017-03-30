<?php
require_once 'init.php';

$sql = "SELECT * FROM `tasks` WHERE `completed` != '1' AND `active` = '1'";
$allTaskToSender = $db->query($sql);
while($taskToNotif = $allTaskToSender->fetch()){
	$u = new User($taskToNotif['userId']);

	$haventTime = $taskToNotif['expiredBy'] < date('Y-m-d', strtotime('+2 days'));
	if ($haventTime && !$taskToNotif['completed'] && $taskToNotif['active']) {
		$message = 'You have a task toDo!'.$taskToNotif['id'];
		$sender->sendMessage($u->chatId, $message);
	}
}
?>
