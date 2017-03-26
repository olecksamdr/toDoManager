<?php

//Get data for tasks
// if (isset($_GET['listId'])) {
// 	$listId = $_GET['listId'];
// 	$qForTask = "SELECT `tasks`.`id`, `tasks`.`title`, `tasks`.`description` FROM `lists` LEFT JOIN `tasks` ON (`lists`.`id` = `tasks`.`listId`) WHERE `lists`.`id` = ? ORDER BY `id` DESC";
// 	$task = $db->prepare($qForTask);
// 	$task->execute(Array($listId));
// }

//Get data for current task
if (isset($_GET['taskId'])) {
	$taskId = $_GET['taskId'];
	$qForTask = "SELECT * FROM `tasks` WHERE `id` = ? LIMIT 1";
	$currentTask = $db->prepare($qForTask);
	$currentTask->execute(Array($taskId));
}
//Get data for list
if (isset($_GET['listId'])) {
	$listId = $_GET['listId'];
	$qForList = "SELECT * FROM `lists` WHERE `id` = ?";
	$list = $db->prepare($qForList);
	$list->execute(Array($listId));
	$dataFromList = $list->fetch();
}
//Get data about user
$qForUser = "SELECT * FROM `users` WHERE `id` = ?";
$userPrepare = $db->prepare($qForUser);
$userPrepare->execute(Array(1));
$user = $userPrepare->fetch();
?>