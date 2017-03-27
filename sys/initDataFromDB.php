<?php
//Get data for current task
if (isset($_GET['taskId'])) {
	$taskId = $_GET['taskId'];
	$qForTask = "SELECT * FROM `tasks` WHERE `id` = ? LIMIT 1";
	$currentTask = $db->prepare($qForTask);
	$currentTask->execute(Array($taskId));
}
//Get data about user
$qForUser = "SELECT * FROM `users` WHERE `id` = ?";
$userPrepare = $db->prepare($qForUser);
$userPrepare->execute(Array(1));
$user = $userPrepare->fetch();
?>